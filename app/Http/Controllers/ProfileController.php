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
        $request->validate([
            'name' => 'required',
            'matricular'  => 'required',
            // 'birth' => 'required|date',
            'address' => 'required',
            'department' => 'required',
            'sexe' => 'required',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        // if(User::where('name',$user->name)->count() == 0 && User::where('') )
        $user->name = $request->name;
        $user->matricule = $request->matricular;
        $user->level = $request->level;
        $user->address = $request->address;
        $user->dept = $request->department;
        $user->sexe = $request->sexe;
        $user->save();
        return redirect()->back()->with('message','informations updated successfully !!');

    }
}
