<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Traits\NotificationTrait;
use App\Http\Traits\TrendTrait;
use App\Http\Traits\UserTrait;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Hash;

final class UserController extends Controller
{
    use UserTrait, NotificationTrait, TrendTrait;

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
    public function edit(Request $request)
    {
        return view('settings', [
            'user' => User::findOrFail($request->session()->get('user_id')),
            'isRead' => $this->toRead($request->session()->get('user_id')),
            'trends' => $this->topTrends()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $request->validated();
        $user = User::findOrFail($request->session()->get('user_id'));
        $uploadedFileUrl = $user->profile_image;

        if ($request->file('profile_image') !== null) {
            $uploadedFileUrl = Cloudinary::upload($request->file('profile_image')->getRealPath())->getSecurePath();
        }

        $result = $user->update([
            'id' => $request->session()->get('user_id'),
            'name' => $request->name,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'bio' => $request->bio,
            'profile_image' => $uploadedFileUrl
        ]);

        session(['user_name' => $user->name]);
        session(['username' => $user->username]);

        return $result > 0 ? redirect('/home')->with('success', 'Modifiche avvenute con successo! 🎉') : 
            back()->with('error', 'Errore nella modifica dei dati 🙄');
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
