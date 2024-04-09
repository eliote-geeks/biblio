<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile.profile');
    }

    public function deleteAccount()
    {
        return view('profile.delete');
    }

    public function security()
    {
        return view('profile.security');
    }
}
