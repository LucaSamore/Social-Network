<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

final class ProfileController extends Controller
{
    public function profile(Request $request, string $username)
    {
        return view('profile', [
            'trends' => $this->topTrends()
        ]);
    }

    private function topTrends()
    {
        return Tag::withCount('posts')
            ->orderByDesc('posts_count')
            ->take(5)
            ->get()
            ->toArray();
    }
}
