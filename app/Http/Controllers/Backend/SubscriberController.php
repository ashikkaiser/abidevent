<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $users = Subscriber::all();
        return view('backend.subscribe.index', compact('users'));
    }

    public function create()
    {
        return view('backend.subscribe.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = Subscriber::findOrNew($request->id);
        $user->name      = $request->name;
        $user->email      = $request->email;
        $user->save();
        return redirect()->route('users.index')->with('message', 'New User Added Successfully');
    }
    public function edit($id)
    {
        $user = Subscriber::find($id);
        return view('backend.subscribe.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = Subscriber::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', Rule::unique('users')->ignore($user->id),],

        ]);

        $user->name      = $request->name;
        $user->email      = $request->email;

        return redirect()->route('users.index')->with('message', 'Users Updated Successfully');
    }


    public function destroy($id)
    {
        Subscriber::find($id)->delete();
        return redirect()->route('subscriber.index')->with('message', 'Subscriber Deleted Successfully');
    }
}
