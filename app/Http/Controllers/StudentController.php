<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::where('user_type')->get();
        return view('user.student', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('user.userlist', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $student)
    {
        if($student->user_type == "App\Models\Admin")
            $student->user_type = NULL;   
        else
            $student->user_type = "App\Models\Admin";
                    
         $student->save();

        toastr()->warning('User role has been updated successfully.');
        return to_route('student.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        $student->delete();
        toastr()->warning('User deleted successfully.');

        return to_route('student.index')->with('messsage', 'Student deleted successfully');
    }
}
