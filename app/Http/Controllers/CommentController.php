<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Traits\NotificationTrait;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class CommentController extends Controller
{
    use NotificationTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $request->validated();

        $comment = new Comment([
            'id' => (string) Str::uuid(),
            'user_id' => $request->session()->get('user_id'),
            'post_id' => $request->post_id,
            'textual_content' => $request->comment,
            'number_of_likes' => 0
        ]);

        if ($comment->save()) {
            $post = Post::where('id', $request->post_id);
            $post->update(['number_of_comments' => $post->first()->number_of_comments + 1]);
            $this->notifyCommentToPost($request->session()->get('user_id'), $post->first()->user->id);
            return $comment->toArray();
        }

        return back()->with('error', 'Errore nella creazione del commento 🙄');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    public function update(Request $request)
    {
        return Comment::where('id', $request->comment_id)
            ->update(['textual_content' => $request->textual_content]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $comment_id
     * @return int
     */
    public function destroy(string $comment_id)
    {
        $post = Comment::findOrFail($comment_id)->post;
        $post->update(['number_of_comments' => $post->number_of_comments - 1]);
        return Comment::destroy($comment_id);
    }
}
