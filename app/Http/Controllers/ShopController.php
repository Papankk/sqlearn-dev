<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class ShopController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        return view('shop.index');
    }

    public function createTransaction(Request $request)
    {
        $validated = $request->validate([
            'diamond' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $orderId = 'TOPUP-' . Str::uuid(); // Unique order ID
        $amount = $validated['diamond'] * 500;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => [
                [
                    'id' => 'diamond',
                    'price' => 500,
                    'quantity' => $validated['diamond'],
                    'name' => $validated['diamond'] . ' Diamond',
                ]
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function refillHeart()
    {
        $user = Auth::user();

        // Check if user has enough diamonds
        if ($user->diamond < 50) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak cukup diamond untuk melanjutkan transaksi!'
            ], 400);
        }

        if ($user->heart == 5) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hatimu sudah penuh!'
            ], 400);
        }

        // Deduct diamonds and refill heart
        $user->diamond -= 50;
        $user->heart = 5;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Hatimu telah dipulihkan! Kamu sekarang memiliki ' . $user->diamond . ' diamond tersisa.',
            'diamonds_left' => $user->diamond
        ]);
    }
}
