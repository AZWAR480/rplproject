<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Cek otentikasi dengan username dan password
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate(); // Regenerasi session

            // Simpan username ke session
            $request->session()->put('username', $credentials['username']);

            // Redirect ke halaman admin jika pengguna adalah admin
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            // Redirect ke halaman dashboard user jika bukan admin
            return redirect()->route('dashboard');
        }

        // Menampilkan pesan kesalahan jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return Redirect::route('login');
    }
}
