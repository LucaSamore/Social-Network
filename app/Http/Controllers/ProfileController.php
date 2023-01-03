<?php

namespace App\Http\Controllers;

use App\Http\Traits\PostTrait;
use App\Http\Traits\TrendTrait;
use Illuminate\Http\Request;

final class ProfileController extends Controller
{
    use TrendTrait, PostTrait;

    public function profile(Request $request, string $username)
    {
        return view('profile', [
            'username' => $username,
            'trends' => $this->topTrends(),
            'posts' => $this->index($username)
        ]);
    }
}
