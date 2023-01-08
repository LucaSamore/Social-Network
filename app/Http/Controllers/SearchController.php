<?php

namespace App\Http\Controllers;

use App\Http\Traits\NotificationTrait;
use Illuminate\Http\Request;

final class SearchController extends Controller
{
    use NotificationTrait;

    public function search(Request $request)
    {
        return view('search', [
            'isRead' => $this->toRead($request->session()->get('user_id'))
        ]);
    }
}
