<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        $perPage = 10; 
        $outlets = Outlet::paginate($perPage); 

        return view('outlets.index', compact('outlets'));
    }

    public function tambah()
    {
        return view('outlets.form');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'telepon' => 'required|max:20',
        ]);

        Outlet::create($request->all());
        return redirect()->route('outlets')->with('success', 'Outlet berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);

        return view('outlets.form', compact('outlet'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'telepon' => 'required|max:20',
        ]);

        $outlet = Outlet::findOrFail($id);
        $outlet->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('outlets')->with('success', 'Outlet berhasil diperbarui!');
    }

    public function hapus($id)
	{
    	Outlet::find($id)->delete();

    	return redirect()->route('outlets');
	}

    public function search(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword) {
            $outlet = Outlet::where('alamat', 'like', "%" . $keyword . "%")->paginate(5);
        } else {
            $outlet = Outlet::paginate(5);
        }

        return view('outlets.index', ['outlets' => $outlet]);
    }
}