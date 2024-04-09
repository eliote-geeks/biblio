<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function updateProfile(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'required',
            'matricular'  => 'required',
            'birth' => 'required|date',
            'address' => 'required',
            'department' => 'required',
            'sexe' => 'required',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->matricular = $request->matricular;
        $user->birth = $request->birth;
        $user->address = $request->address;
        $user->department = $request->department;
        $user->sexe = $request->sexe;
        $user->save();
        return redirect()->back()->with('message','informations updated !!');

    }
}
