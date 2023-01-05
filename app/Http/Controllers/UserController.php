<?php

namespace App\Http\Controllers;

use App\Http\Traits\UserTrait;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    use UserTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function follow(Request $request)
    {
        $follower = new Follower([
            'id' => (string) Str::uuid(),
            'follower' => User::where('username', $request->my_username)->first()->id,
            'followee' => User::where('username', $request->other_username)->first()->id
        ]);

        return $follower->save();
    }

    public function unfollow(Request $request)
    {
        $follow = Follower::where('follower', User::where('username', $request->my_username)->first()->id)
            ->where('followee', User::where('username', $request->other_username)->first()->id)
            ->first();

        return $follow->delete();
    }
}
