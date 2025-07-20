<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class AddAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tambahkan admin ke tabel users
        DB::table('users')->insert([
            'username' => 'admin',
            'nama' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin#123'), // Pastikan password terenkripsi
            'alamat' => 'Admin Address',
            'is_admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Hapus admin dari tabel users
        DB::table('users')->where('username', 'admin')->delete();
    }
}
