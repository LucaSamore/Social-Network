<?php

namespace App\Http\Controllers;

use App\Http\Traits\NotificationTrait;
use App\Http\Traits\UserTrait;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    use UserTrait, NotificationTrait;

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
        $myId = User::where('username', $request->my_username)->first()->id;
        $otherId = User::where('username', $request->other_username)->first()->id;

        $follower = new Follower([
            'id' => (string) Str::uuid(),
            'follower' => $myId,
            'followee' => $otherId
        ]);

        $result = $follower->save();

        if ($result) {
            $this->notifyFollow($myId, $otherId);
        }

        return $result;
    }

    public function unfollow(string $my_username, string $other_username)
    {
        $follow = Follower::where('follower', User::where('username', $my_username)->first()->id)
            ->where('followee', User::where('username', $other_username)->first()->id)
            ->first();

        return $follow->delete();
    }
}
