<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'password' => $request->password,
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

    public function settingAccount()
    {
        $user = Auth::user();
        return view('Sidebar.Acount.Setting_account', compact('user'));
    }

    public function bukuSimpan()
    {
        $user = Auth::user();
        $bukuTersimpan = BukuTersimpan::with('buku.kategori')->where('id_user', $user->id_user)->get();
        return view('Sidebar.buku_simpan', compact('bukuTersimpan'));
    }

    public function scaneBarcode()
    {
        return view('Sidebar.scane_barcode');
    }

    public function sidebarSettings()
    {
        return view('Sidebar.settings');
    }

    public function settingProfile()
    {
        $user = auth()->user();
        return view('Sidebar.Acount.Setting_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user()->id_user, 'id_user')],
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $data = $request->only('username', 'email', 'deskripsi');

        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(public_path('images/profiles/' . $user->foto))) {
                unlink(public_path('images/profiles/' . $user->foto));
            }
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('images/profiles'), $filename);
            $data['foto'] = $filename;
        }

        $user->update($data);

        return redirect()->route('tampilan-awal')->with('success', 'Profile berhasil diupdate!');
    }
}

