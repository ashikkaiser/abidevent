<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = User::findOrNew($request->id);
        $user->name      = $request->name;
        $user->email      = $request->email;
        $user->password      = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index')->with('message', 'New User Added Successfully');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', Rule::unique('users')->ignore($user->id),],

        ]);

        $user->name      = $request->name;
        $user->email      = $request->email;
        if ($request->password) {
            $user->password      = Hash::make($request->password);
        }
        return redirect()->route('users.index')->with('message', 'Users Updated Successfully');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message', 'Users Deleted Successfully');
    }
}
