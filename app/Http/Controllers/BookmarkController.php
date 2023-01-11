<?php

namespace App\Http\Controllers;

use App\Http\Traits\TrendTrait;
use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Http\Request;

final class BookmarkController extends Controller
{
    use TrendTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        $userId = auth()->user()->id;
        $bookmark = new BookMark([
            'user_id' => $userId, 
            'post_id' => $post->id,
        ]); 
        $bookmark->save();
    }

    /**
     * Display the specified resource.
     *
     *      * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $bookmarks = Post::whereIn('id', Bookmark::select('post_id')
            ->where('user_id', $request->session()->get('user_id')))
            ->get();

        return view('bookmarks',  [
            'bookmarks' => $bookmarks,
            'trends' => $this->topTrends(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        Bookmark::destroy($bookmark->id); 
    }

    /**
     * Check if the logged in user has already saved the post passed as argument.
     *
     * @return \Illuminate\Http\Response
     */
    public function isABookmark(Post $post)
    {
        $userId = auth()->user()->id;
        return Bookmark::where('user_id', $userId)
            ->where('post_id', $post->id)
            ->exists();
    }
}
