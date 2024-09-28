<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {        
        $membership = Membership::where('user_id', Auth::id())->first();

        return view('membership.index', compact('membership'));
    }

    public function tambah()
	{
		return view('membership.form');
	}

    public function simpan(Request $request)
	{
        $request->validate([
            'tglbuat' => 'required|date',
            'tglkadaluwarsa' => 'required|date|after:tglbuat',
        ]);

        Membership::create([
            'user_id' => Auth::id(), 
            'tglbuat' => $request->tglbuat,
            'tglkadaluwarsa' => $request->tglkadaluwarsa,
        ]);

        return redirect()->route('membership')->with('success', 'Membership berhasil dibuat!');
	}

    public function hapus($id)
	{
		Membership::find($id)->delete();

		return redirect()->route('membership');
	}
}
