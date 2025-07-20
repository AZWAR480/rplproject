<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'alamat' => 'required',
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/')->with('pesan', 'Data berhasil disimpan');
    }
    public function register() {
        return view('register');
    }
}
