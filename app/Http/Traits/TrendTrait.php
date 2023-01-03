<?php

namespace App\Http\Traits;

use App\Models\Tag;

trait TrendTrait {
    private function topTrends()
    {
        return Tag::withCount('posts')
            ->orderByDesc('posts_count')
            ->limit(5)
            ->get();
    }
}