<?php

namespace App\Http\Traits;

use App\Models\Tag;
use App\Models\TagsInPost;
use Illuminate\Support\Str;

trait TrendTrait {
    private function topTrends()
    {
        return Tag::withCount('posts')
            ->orderByDesc('posts_count')
            ->limit(5)
            ->get();
    }

    private function parseTags(?string $content)
    {
        if ($content === null) {
            return;
        }

        $parts = preg_split('/\s+/', $content);

        if (!$parts) {
            return null;
        }

        return array_unique(array_filter($parts, fn($value) => str_starts_with($value, '#')));
    }

    private function storeTags(string $post_id, ?array $tags) 
    {
        if (empty($tags) || $tags === null) {
            return;
        }

        foreach ($tags as $tag) {
            
            if (!Tag::where('name', $tag)->first()) {
                $newTag = new Tag(['name' => $tag]);
                $newTag->save();
            }

            $tagInPost = new TagsInPost([
                'id' => (string) Str::uuid(),
                'post_id' => $post_id,
                'tag_name' => $tag
            ]);

            $tagInPost->save();
        }
    }

    private function updateTags(string $post_id, ?array $tags)
    {
        TagsInPost::where('post_id', $post_id)->delete();
        $this->storeTags($post_id, $tags);
    }
}