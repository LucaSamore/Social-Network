<?php

namespace App\Http\Controllers;

use App\Http\Traits\TrendTrait;
use Illuminate\Http\Request;

final class ProfileController extends Controller
{
    use TrendTrait;

    public function profile(Request $request, string $username)
    {
        return view('profile', [
            'trends' => $this->topTrends()
        ]);
    }
}
