<?php

namespace App\Http\Controllers;

use App\Http\Traits\NotificationTrait;
use App\Http\Traits\UserTrait;
use Illuminate\Http\Request;

final class SearchController extends Controller
{
    use NotificationTrait, UserTrait;

    public function search(Request $request)
    {
        $results = array();

        if ($request->search) {
            $results = $this->searchUsers($request->search);
        }

        return view('search', [
            'results' => $results,
            'isRead' => $this->toRead($request->session()->get('user_id'))
        ]);
    }
}
