<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('user_id', Auth::id())->get();

        return view('review.index', compact('reviews'));
    }

    public function tambah()
	{
		return view('review.form');
	}

    public function simpan(Request $request)
	{
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->route('review')->with('success', 'Review berhasil dibuat!');
	}

    public function hapus($id)
	{
		Review::find($id)->delete();

		return redirect()->route('review');
	}
}
