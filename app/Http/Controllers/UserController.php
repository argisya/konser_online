<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function login()
    {
        return view('login.index');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan informasi user ke session
            session(['user_id' => $user->id, 'user_name' => $user->nama_lengkap]);
            return redirect()->route('user.index')->with('success', 'Login berhasil!');
        } else {
            return redirect()->back()->withErrors(['login' => 'Email atau password salah.'])->withInput();
        }
    }

    public function register()
    {
        return view('login.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|',
        ]);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.login.index')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('user.index')->with('success', 'Logout berhasil!');
    }
}