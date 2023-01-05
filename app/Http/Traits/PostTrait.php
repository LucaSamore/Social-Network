<?php

namespace App\Http\Traits;

use App\Models\Post;
use App\Models\User;

trait PostTrait {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $username)
    {
        return Post::where('user_id', User::where('username', $username)->first()->id)
            ->orderByDesc('created_at')
            ->get();
    }
}