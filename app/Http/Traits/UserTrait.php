<?php

namespace App\Http\Traits;

use App\Models\Follower;
use App\Models\User;

trait UserTrait {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function searchUsers(string $search)
    {
        return User::where('username', $search)
            ->orWhere('username', 'like', '%'.$search.'%')
            ->orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('surname', 'like', '%'.$search.'%')
            ->orderBy('username')
            ->take(50)
            ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($username)
    {
        return User::where('username', $username)->first();
    }

    public function isFollowing(string $follower, string $following)
    {
        return Follower::where('follower', User::where('username', $follower)->first()->id)
            ->where('followee', User::where('username', $following)->first()->id)
            ->first();
    }
}