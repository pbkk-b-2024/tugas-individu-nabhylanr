<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Discount;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('menu') 
                         ->where('user_id', Auth::id())
                         ->get();
        $discount = session()->get('discount');
        $payment = Payment::get();
        
        return view('cart.index', compact('cartItems', 'discount', 'payment'));
    }

    public function tambah($menuId, Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('menu_id', $menuId)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'menu_id' => $menuId,
                'quantity' => $request->input('quantity', 1),
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function hapus($id)
    {
        $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Item removed from cart!');
        }

        return redirect()->back()->with('error', 'Item not found in your cart!');
    }

    public function applyDiscount(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|string|exists:discount,kode_diskon',
        ]);

        $discount = Discount::where('kode_diskon', $request->discount_code)->first();

        if ($discount) {
            session()->put('discount', $discount); 
            return redirect()->route('cart')->with('success', 'Diskon berhasil diterapkan!');
        }

        return redirect()->route('cart')->with('error', 'Kode diskon tidak valid.');
    }

    public function cancelDiscount()
    {
        session()->forget('discount');
        return redirect()->route('cart')->with('success', 'Diskon berhasil dibatalkan!');
    }

    public function simpan(Request $request)
    {
        $cartItems = Cart::with('menu')
                        ->where('user_id', Auth::id())
                        ->get();

        $discount = session()->get('discount');
        $totalPrice = $cartItems->sum(function($item) {
            return $item->menu->harga * $item->quantity;
        });

        $discountAmount = isset($discount) ? ($totalPrice * floatval($discount->nilai_diskon) / 100) : 0;
        $finalPrice = $totalPrice - $discountAmount;

        session()->put('transaction', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'discount' => $discountAmount,
            'finalPrice' => $finalPrice,
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil dilakukan. Total yang dibayarkan: Rp ' . number_format($finalPrice, 0, ',', '.'));
    }
}

