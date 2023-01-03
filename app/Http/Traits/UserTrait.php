<?php

namespace App\Http\Traits;

use App\Models\User;

trait UserTrait {
    
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
}