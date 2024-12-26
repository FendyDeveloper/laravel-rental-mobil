<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nik' => '1234567890123456',
            'name' => 'John Doe',
            'gender' => 'male',
            'telp' => '081234567890',
            'address' => 'Jl. Contoh No. 1',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'), // Pastikan untuk menggunakan hash
        ]);

        User::create([
            'nik' => '1234567890123457',
            'name' => 'Atlas Smith',
            'gender' => 'female',
            'telp' => '081234567898',
            'address' => 'Jl. Contoh No. 3',
            'email' => 'petugas@gmail.com',
            'role' => 'petugas',
            'password' => bcrypt('admin123'), // Pastikan untuk menggunakan hash
        ]);

        User::create([
            'nik' => '2345678901234567',
            'name' => 'Jane Smith',
            'gender' => 'female',
            'telp' => '081234567891',
            'address' => 'Jl. Contoh No. 2',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => bcrypt('admin123'),
        ]);
    }
}
