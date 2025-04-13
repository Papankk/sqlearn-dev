<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index()
    {
        $data_user = User::orderByDesc('exp')->get();

        // Find the logged-in user's rank
        $userRank = $data_user->search(fn($user) => $user->id === Auth::id()) + 1;

        return view('leaderboard/index', compact('data_user', 'userRank'));
    }
}
