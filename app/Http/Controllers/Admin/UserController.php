<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.all_users' , compact('users'));
    }

    public function create()
    {
        return view('admin.users.add_user');
    }

    public function store(UserRequest $request)
    {
        $validation = $request->validated();
        $validation['password'] = bcrypt($validation['password']);
        User::create($validation);
        return redirect()->route('users.index')->with('success' , 'User Added Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.update_user' , compact('user'));
    }

    public function update(UserRequest $request , $id)
    {
        $user = User::find($id);
        $validation = $request->validated();
        $user->update($validation);
        return redirect()->route('users.index')->with('success' , 'User Updated Successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'User Deleted Successfully');
    }
}
