<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
public function showAuth()
    {
        // Jika sudah login, redirect ke dashboard
        if (Session::has('user')) {
            return redirect('/dashboard');
        }
        return view('auth-main');
    }

    public function showDaftar()
    {
        // Jika sudah login, redirect ke dashboard
        if (Session::has('user')) {
            return redirect('/dashboard');
        }
        return view('daftar');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Simulasi login sederhana (ganti dengan DB nanti)
        if ($username === 'admin' && $password === 'password') {
            Session::put('user', ['username' => $username]);
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        } else {
            return back()->with('error', 'Username atau password salah!');
        }
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users', // simulasi unique
            'password' => 'required|string|min:6|max:255',
            'keterangan' => 'required|string|max:500',
        ]);

        // Simulasi register (ganti dengan DB nanti)
        Session::put('user', [
            'username' => $request->input('username'),
            'keterangan' => $request->input('keterangan')
        ]);

        return redirect('/dashboard')->with('success', 'Pendaftaran berhasil! Selamat datang ' . $request->input('username'));
    }

    public function dashboard()
    {
        if (!Session::has('user')) {
            return redirect('/');
        }
        $user = Session::get('user');
        return view('dashboard', ['user' => $user]);
    }

    public function showForgot()
    {
        if (Session::has('user')) {
            return redirect('/dashboard');
        }
        return view('forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email',
            'new_password' => 'required|string|min:6|max:255',
        ]);

        $no_telp = $request->input('no_telp');
        $email = $request->input('email');
        $new_password = $request->input('new_password');

        // Simulasi reset: cek admin
        if ($email === 'admin@example.com' && $no_telp === '08123456789') {
            // Set session login dengan pass baru (simulasi)
            Session::put('user', ['username' => 'admin']);
            return redirect('/dashboard')->with('success', 'Password berhasil direset! Selamat datang admin.');
        } else {
            return back()->with('error', 'Email atau nomor telepon tidak cocok!');
        }
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}

