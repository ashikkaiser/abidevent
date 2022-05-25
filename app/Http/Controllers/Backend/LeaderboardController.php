<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index($type)
    {
        $students = Students::query();
        $students = $students->where('school_level', $type)->with('statics');
        // dd($students->get());

        return view('backend.leaderboard', compact('students'));
    }
}
