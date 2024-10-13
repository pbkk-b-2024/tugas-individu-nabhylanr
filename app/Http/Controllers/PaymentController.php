<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
	{
		$payment = Payment::with('cart')->paginate(5);
	
		return view('payment.index', ['payment' => $payment]);
	}
	
	public function tambah()
	{
		return view('payment.form');
	}

	public function simpan(Request $request)
	{
		Payment::create(['method' => $request->method]);

		return redirect()->route('payment');
	}

	public function edit($id)
	{
		$payment = Payment::find($id)->first();

		return view('payment.form', ['payment' => $payment]);
	}

	public function update($id, Request $request)
	{
		Payment::find($id)->update(['method' => $request->method]);

		return redirect()->route('payment');
	}

	public function hapus($id)
	{
    	Payment::find($id)->delete();

    	return redirect()->route('payment');
	}


	public function search(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword) {
            $payment = Payment::where('method', 'like', "%" . $keyword . "%")->paginate(5);
        } else {
            $payment = Payment::paginate(5);
        }

        return view('payment.index', ['payment' => $payment]);
    }
}
