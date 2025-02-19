<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use App\Models\Sesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BabController extends Controller
{
    function index()
    {
        $data_bab = Bab::all();

        return view('bermain.index', compact('data_bab'));
    }

    function show($slug)
    {
        $user = Auth::user();
        $bab = Bab::where('slug', $slug)->firstOrFail();

        $data_bab = Bab::where('id', $bab->id)->firstOrFail();
        $id_bab = $data_bab->id;

        $data_sesi = Sesi::where('id_bab', $id_bab)->get();

        if (request()->expectsJson()) {
            if ($user->hearts <= 0) {
                return response()->json(['error' => 'out_of_hearts'], 403);
            }
        }

        return view('bermain.show', [
            'data_sesi' => $data_sesi,
            'id_bab' => $id_bab,
            'user' => $user,
            'slug_sesi' => $slug
        ]);
    }
}
