<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::with('menu')->paginate(5);

        return response()->json([
            'success' => true,
            'data' => $kategori,
            'message' => 'Kategori list retrieved successfully.'
        ], 200);
    }

    public function simpan(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::create($data);

        return response()->json([
            'success' => true,
            'data' => $kategori,
            'message' => 'Kategori added successfully.'
        ], 201);
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $kategori
        ], 200);
    }

    public function update($id, Request $request)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori not found.'
            ], 404);
        }

        $data = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Kategori updated successfully.'
        ], 200);
    }

    public function hapus($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori not found.'
            ], 404);
        }

        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori deleted successfully.'
        ], 200);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');

        $kategori = Kategori::where('nama', 'like', "%" . $keyword . "%")->paginate(5);

        return response()->json([
            'success' => true,
            'data' => $kategori,
            'message' => 'Search results retrieved successfully.'
        ], 200);
    }
}
