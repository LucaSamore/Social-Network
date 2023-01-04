<?php

namespace App\Http\Controllers;

use App\Http\Traits\PostTrait;
use App\Http\Traits\TrendTrait;
use App\Http\Traits\UserTrait;
use Illuminate\Http\Request;

final class ProfileController extends Controller
{
    use TrendTrait, PostTrait, UserTrait;

    public function profile(Request $request, string $username)
    {
        return view('profile', [
            'username' => $username,
            'trends' => $this->topTrends(),
            'user' => $this->show($username),
            'posts' => $this->index($username),
            'isItMe' => $request->session()->get('username') === $username,
            'isFollowing' => $this->isFollowing($request->session()->get('username'), $username)
        ]);
    }
}
