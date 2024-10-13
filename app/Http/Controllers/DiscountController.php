<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {        
        $discounts = Discount::paginate(5);
        return view('discount.index', compact('discounts'));
    }

    public function tambah()
    {
        return view('discount.form');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kode_diskon' => 'required|string|unique:discount,kode_diskon', 
            'nilai_diskon' => 'required|numeric|min:1|max:100', 
        ]);

        Discount::create([
            'kode_diskon' => $request->kode_diskon,
            'nilai_diskon' => $request->nilai_diskon,
            'tipe_diskon' => 'persentase'
        ]);

        return redirect()->route('discount')->with('success', 'Diskon berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id); 

        return view('discount.form', compact('discount'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'kode_diskon' => 'required|string|unique:discount,kode_diskon,' . $id, 
            'nilai_diskon' => 'required|numeric|min:1|max:100', 
        ]);

        $discount = Discount::findOrFail($id);
        $discount->update([
            'kode_diskon' => $request->kode_diskon,
            'nilai_diskon' => $request->nilai_diskon,
        ]);

        return redirect()->route('discount')->with('success', 'Diskon berhasil diperbarui!');
    }

    public function hapus($id)
    {
        Discount::findOrFail($id)->delete();

        return redirect()->route('discount')->with('success', 'Diskon berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword) {
            $discounts = Discount::where('kode_diskon', 'like', "%" . $keyword . "%")->paginate(5);
        } else {
            $discounts = Discount::paginate(5);
        }

        return view('discount.index', compact('discounts'));
    }
}