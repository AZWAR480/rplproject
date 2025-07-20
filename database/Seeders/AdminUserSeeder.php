<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['username' => 'admin'], // Ganti kolom email dengan username
            [
                'nama' => 'Administrator',
                'email' => 'admin@example.com', // Tambahkan nilai untuk kolom email
                'password' => Hash::make('admin#123'),
                'alamat' => 'Admin Address',
                'is_admin' => true,
            ]
        );
    }
}
