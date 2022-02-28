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


    public function follow(User $currentUser, User $user)
    {
        $currentUser->follow()->attach($user);
        return back();
    }

    public function unfollow(User $currentUser, User $user)
    {
        $currentUser->follow()->detach($user);
        return back();
    }
}
