<?php

namespace App\Http\Controllers;

use App\Models\Kategori; 
use App\Models\Order; 
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
{
    $categories = \App\Models\Kategori::with('menu')->get();

    return view('order.index', compact('categories'));
}

}
