<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
	public function index()
	{
		$menu = Menu::paginate(5);

		return view('menu.index', ['data' => $menu]);
	}

	public function tambah()
	{
		$kategori = Kategori::get();

		return view('menu.form', ['kategori' => $kategori]);
	}

	public function simpan(Request $request)
	{
		$data = [
			'kode_menu' => $request->kode_menu,
			'nama_menu' => $request->nama_menu,
			'id_kategori' => $request->id_kategori,
			'harga' => $request->harga,
			'jumlah' => $request->jumlah,
		];

		Menu::create($data);

		return redirect()->route('menu');
	}

	public function edit($id)
	{
		$menu = Menu::find($id)->first();
		$kategori = Kategori::get();

		return view('menu.form', ['menu' => $menu, 'kategori' => $kategori]);
	}

	public function update($id, Request $request)
	{
		$data = [
			'kode_menu' => $request->kode_menu,
			'nama_menu' => $request->nama_menu,
			'id_kategori' => $request->id_kategori,
			'harga' => $request->harga,
			'jumlah' => $request->jumlah,
		];

		Menu::find($id)->update($data);

		return redirect()->route('menu');
	}

	public function hapus($id)
	{
		Menu::find($id)->delete();

		return redirect()->route('menu');
	}

	public function search(Request $request)
    {
    $keyword = $request->input('search');

    if ($keyword) {
        $menu = Menu::where('nama_menu', 'like', "%" . $keyword . "%")->paginate(5);
    } else {
        $menu = Menu::paginate(5);
    }

    return view('menu.index', ['data' => $menu]);
    }

}