<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show(User $user)
    {
        return view('other-users.profile', ['user' => $user]);
    }


    public function follow(User $user)
    {
        Auth::user()->follow()->attach($user);
        return back();
    }

    public function unfollow(User $user)
    {
        Auth::user()->follow()->detach($user);
        return back();
    }
}
