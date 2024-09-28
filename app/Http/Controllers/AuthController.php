<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSimpan(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin',
            'mobile' => $request->mobile,
            'address' => $request->address,
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAksi(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        Validator::make($request->all(), [
            'mobile' => 'nullable|string',
            'address' => 'nullable|string',
            'role' => 'required|in:Admin,User', // Validasi untuk role
        ])->validate();

        $user->update([
            'mobile' => $request->mobile, // Update nomor telepon
            'address' => $request->address, // Update alamat
            'level' => $request->role, // Update role
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function profile()
    {
        return view('profile');
    }
}
