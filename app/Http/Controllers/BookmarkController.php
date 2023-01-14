<?php

namespace App\Http\Controllers;

use App\Http\Traits\NotificationTrait;
use App\Http\Traits\TrendTrait;
use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class BookmarkController extends Controller
{
    use TrendTrait, NotificationTrait;

    public function update(Request $request)
    {
        $bookmark = Bookmark::where('post_id', $request->post_id)
            ->where('user_id', $request->session()->get('user_id'));

        if ($bookmark->get()->isEmpty()) {
            $newBookmark = new Bookmark([
                'id' => (string) Str::uuid(),
                'created_at' => now(),
                'post_id' => $request->post_id,
                'user_id' => $request->session()->get('user_id')
            ]);

            $newBookmark->save();
            return 1;

        } else {
            $bookmark->delete();
            return 0;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $bookmarks = Post::whereIn('id', Bookmark::select('post_id')
                ->where('user_id', $request->session()->get('user_id'))
                ->get()
                ->toArray())->get();

        return view('bookmarks', [
            'bookmarks' => $bookmarks,
            'trends' => $this->topTrends(),
            'isRead' => $this->toRead($request->session()->get('user_id'))
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
