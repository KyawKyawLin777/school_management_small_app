<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('user.user', compact('users', 'subjects', 'grades'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;

        if ($request->type === 'Admin1') {
            $user->is_admin = 1;
        } else {
            $user->is_admin = 0;
        }

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User Registered Successfully!');
    }

    public function delete($id)
    {

        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('delete', 'User Delete Successfully!');
    }

    public function edit($id)
    {

        $user = User::find($id);
        return view('user.user_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect(url('user'))->with('success', 'User updated successfully!');
    }
}
