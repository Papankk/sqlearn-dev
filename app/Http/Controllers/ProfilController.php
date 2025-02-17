<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function show(Request $request): View
    {
        return view('user.profile', [
            'user' => $request->user(),
        ]);
    }
}
