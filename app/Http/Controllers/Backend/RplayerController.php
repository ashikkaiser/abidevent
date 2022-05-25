<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RecommendedPlayer;
use Illuminate\Http\Request;

class RplayerController extends Controller
{
    public function index()
    {
        $users = RecommendedPlayer::all();
        return view('backend.rplayers.index', compact('users'));
    }

    public function create()
    {
        return view('backend.rplayers.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = RecommendedPlayer::findOrNew($request->id);
        $user->name      = $request->name;
        $user->email      = $request->email;
        $user->save();
        return redirect()->route('users.index')->with('message', 'New User Added Successfully');
    }
    public function edit($id)
    {
        $user = RecommendedPlayer::find($id);
        return view('backend.rplayers.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = RecommendedPlayer::find($id);
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
        RecommendedPlayer::find($id)->delete();
        return redirect()->route('recommended-player.index')->with('message', 'Recommended Player Deleted Successfully');
    }
}
