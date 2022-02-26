<?php

namespace App\Http\Controllers;

use App\Models\User;


class UserProfileController extends Controller
{
    public function index(User $user)
    {
        return view('other-users.profile', ['user' => $user]);
    }
}
