<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Get paginated list of menus
    public function index()
    {
        $menu = Menu::paginate(5);
        return response()->json([
            'success' => true,
            'data' => $menu,
            'message' => 'Menu list retrieved successfully.'
        ], 200);
    }

    // Add new menu
    public function simpan(Request $request)
    {
        $data = $request->validate([
            'kode_menu' => 'required',
            'nama_menu' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        $menu = Menu::create($data);

        return response()->json([
            'success' => true,
            'data' => $menu,
            'message' => 'Menu added successfully.'
        ], 201);
    }

    // Edit an existing menu
    public function edit($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $menu
        ], 200);
    }

    // Update a menu
    public function update($id, Request $request)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu not found.'
            ], 404);
        }

        $data = $request->validate([
            'kode_menu' => 'required',
            'nama_menu' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        $menu->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Menu updated successfully.'
        ], 200);
    }

    // Delete a menu
    public function hapus($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu not found.'
            ], 404);
        }

        $menu->delete();

        return response()->json([
            'success' => true,
            'message' => 'Menu deleted successfully.'
        ], 200);
    }

    // Search for a menu
    public function search(Request $request)
    {
        $keyword = $request->input('search');

        $menu = Menu::where('nama_menu', 'like', "%" . $keyword . "%")->paginate(5);

        return response()->json([
            'success' => true,
            'data' => $menu,
            'message' => 'Search results retrieved successfully.'
        ], 200);
    }
}
