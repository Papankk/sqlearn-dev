<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
    {
        $data_user = User::orderBy('exp', 'desc')->take(10)->get();

        return view('leaderboard.index', compact('data_user'));
    }
}
