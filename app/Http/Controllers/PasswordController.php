<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    // Metode untuk menangani permintaan reset password
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required|min:8|confirmed',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Update password user
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Password berhasil direset.');
    }
}
