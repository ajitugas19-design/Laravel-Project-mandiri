<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku;
use App\Models\BukuTersimpan;

class AuthController extends Controller
{
    public function showAuth()
    {
        if (Auth::check()) {
            return redirect('/tampilan-awal');
        }
        return view('auth-main');
    }

    public function showDaftar()
    {
        if (Auth::check()) {
            return redirect('/tampilan-awal');
        }
        return view('daftar');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        // Plain text password from DB SQL dump
        if ($user && $request->password === $user->password) {
            Auth::login($user);
            return redirect('/tampilan-awal')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau password salah! Username: admin atau aji, Password: 123456');
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password, // Plain for now
            'deskripsi' => $request->deskripsi ?? '',
            'role' => 'user',
        ]);

        Auth::login($user);
        return redirect('/tampilan-awal')->with('success', 'Pendaftaran berhasil!');
    }

    public function tampilanAwal()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        $bukuTersimpan = BukuTersimpan::with('buku.kategori')->where('id_user', $user->id_user)->get();
        $semuaBuku = Buku::with('kategori')->get();

        return view('Tampilan_Awal', compact('user', 'bukuTersimpan', 'semuaBuku'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout berhasil!');
    }

    // Deprecated
    public function dashboard()
    {
        return $this->tampilanAwal();
    }

    public function showForgot()
    {
        if (Auth::check()) {
            return redirect('/tampilan-awal');
        }
        return view('forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        return back()->with('error', 'Fitur coming soon');
    }
}

