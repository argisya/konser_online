<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $konser = Konser::all();
        return view('user.index', [
            'konser' => $konser,
        ]);
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

      // Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    // Jika user tidak ditemukan ATAU password salah
    if (!$user || !Hash::check($request->password, $user->password)) {
        return redirect()->back()->withErrors(['login' => 'Email atau password salah.'])->withInput();
    }

    // Jika user role 1 (user biasa)
    if ($user->role == 1) {
        session([
            'user_id' => $user->id,
            'user_name' => $user->nama_lengkap
        ]);
        return redirect()->route('user.index')->with('success', 'Login berhasil sebagai User!');
    }

    // Jika user role 0 (admin)
    if ($user->role == 0) {
        session([
            'admin_id' => $user->id,
            'admin_name' => $user->nama_lengkap
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai Admin!');
    }

    // Jika role tidak dikenali
    return redirect()->back()->withErrors(['login' => 'Role pengguna tidak valid!']);
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