<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bab;
use App\Models\Soal;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'jumlah_bab' => Bab::count(),
            'jumlah_soal' => Soal::count(),
            'jumlah_materi' => Materi::count(),
            'jumlah_user' => User::count()
        ];

        return view('admin.index', compact('data'));
    }

    public function getUserRegistrations()
    {
        $data = DB::table('users')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'total' => (int) $item->total // ← Cast to int here
                ];
            });

        return response()->json($data);
    }
}
