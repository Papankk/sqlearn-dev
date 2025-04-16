<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class ShopController extends Controller
{
    // Konstruktor untuk mengatur konfigurasi Midtrans saat controller diinisialisasi
    public function __construct()
    {
        // Mengatur server key Midtrans dari environment variable
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Menentukan apakah aplikasi berjalan di mode production
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Mengaktifkan sanitasi data
        Config::$isSanitized = true;
        // Mengaktifkan fitur 3DS untuk kartu kredit
        Config::$is3ds = true;
    }

    // Menampilkan halaman utama toko
    public function index()
    {
        return view('shop.index');
    }

    // Membuat transaksi Midtrans berdasarkan permintaan pengguna
    public function createTransaction(Request $request)
    {
        // Validasi input jumlah diamond harus berupa integer dan minimal 1
        $validated = $request->validate([
            'diamond' => 'required|integer|min:1',
        ]);

        // Mengambil data pengguna yang sedang login
        $user = Auth::user();
        // Membuat ID pesanan unik dengan awalan 'TOPUP-'
        $orderId = 'TOPUP-' . Str::uuid();
        // Menghitung total harga berdasarkan jumlah diamond (500 per diamond)
        $amount = $validated['diamond'] * 500;

        // Menyiapkan parameter transaksi untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $orderId, // ID pesanan unik
                'gross_amount' => $amount, // Total pembayaran
            ],
            'customer_details' => [
                'first_name' => $user->name, // Nama pengguna
                'email' => $user->email, // Email pengguna
            ],
            'item_details' => [
                [
                    'id' => 'diamond', // ID item
                    'price' => 500, // Harga per item
                    'quantity' => $validated['diamond'], // Jumlah item
                    'name' => $validated['diamond'] . ' Diamond', // Nama item yang ditampilkan
                ]
            ]
        ];

        // Mengambil Snap Token dari Midtrans untuk transaksi ini
        $snapToken = Snap::getSnapToken($params);

        // Mengembalikan Snap Token sebagai respons dalam format JSON
        return response()->json(['snap_token' => $snapToken]);
    }
}
