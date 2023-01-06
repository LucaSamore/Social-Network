<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Traits\NotificationTrait;
use App\Http\Traits\PostTrait;
use App\Http\Traits\TrendTrait;
use App\Models\Image;
use App\Models\Post;
use App\Models\Like;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

final class PostController extends Controller
{
    use PostTrait, TrendTrait, NotificationTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->validated();

        if (!$request->hasFile('media') && $request->textual_content === null) {
            return back()->with('error', '🙃 Contenuto non specificato 🙃');
        }

        $user_id = $request->session()->get('user_id');

        $post = new Post([
            'id' => (string) Str::uuid(),
            'user_id' => $user_id,
            'textual_content' => $request->textual_content,
            'created_at' => now(),
            'number_of_likes' => 0,
            'number_of_comments' => 0,
            'number_of_reposts' => 0
        ]);

        $res = $post->save();

        $this->storeTags($post->id, $this->parseTags($request->tags));

        if ($request->hasFile('media')) {
            $fileType = explode('/', $request->file('media')->getMimeType())[0];
            if ($fileType === 'image') {
                $uploadedFileUrl = Cloudinary::upload($request->file('media')->getRealPath())->getSecurePath();
                $image = new Image([
                    'id' => (string) Str::uuid(),
                    'post_id' => $post->id,
                    'path' => $uploadedFileUrl
                ]);
                $res = $image->save();
            } else if ($fileType === 'video') {
                $uploadedFileUrl = Cloudinary::uploadVideo($request->file('media')->getRealPath())->getSecurePath();
                $video = new Video([
                    'id' => (string) Str::uuid(),
                    'post_id' => $post->id,
                    'path' => $uploadedFileUrl
                ]);
                $res = $video->save();
            }
        }

        if ($res) {
            return back()->with('success', '🥳 Post creato con successo! 🥳');
        }

        return back()->withErrors('error', '😢 Errore durante la creazione del post 😢');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    public function destroy(string $post_id)
    {
        $image = Image::where('post_id', $post_id)->first();
        $video = Video::where('post_id', $post_id)->first();

        if ($image) {
            $splitURL = explode("/", $image->path);
            $lastElement = end($splitURL);
            $id = explode(".", $lastElement)[0];
            Cloudinary::destroy($id);
        } elseif ($video) {
            $splitURL = explode("/", $video->path);
            $lastElement = end($splitURL);
            $id = explode(".", $lastElement)[0];
            Cloudinary::destroy($id, ["resource_type" => "video"]);
        }

        return Post::destroy($post_id);
    }

    public function like(Request $request, string $post_id): int
    {
        $user_id = $request->session()->get('user_id');
        $post = Post::where('id', $post_id);
        $like = Like::where('user_id', $user_id)->where('post_id', $post_id);
        $numberOfLikes = Like::where('post_id', $post_id)->get()->count();

        if ($like->get()->isEmpty()) {
            $newLike = new Like([
                'id' => (string) Str::uuid(),
                'user_id' => $user_id,
                'post_id' => $post_id
            ]);
            $newLike->save();
            $numberOfLikes += 1;
            $post->update(['number_of_likes' => $numberOfLikes]);
            $this->notifyLikeToPost($user_id, $post->first()->user->id);
        } else {
            $like->delete();
            $numberOfLikes = $numberOfLikes <= 0 ? 0 : $numberOfLikes - 1;
            $post->update(['number_of_likes' => $numberOfLikes]);
        }

        return $numberOfLikes;
    }
}
