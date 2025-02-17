<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SesiController extends Controller
{
    public function show($slug)
    {
        // Retrieve the session ID mapped to this slug
        $id = session("slug_map.$slug");

        if (!$id) {
            abort(404); // If no ID is found for this slug, return 404
        }

        // Retrieve the session
        $sesi = Sesi::findOrFail($id);

        return view('quiz.show', compact('sesi'));
    }
}
