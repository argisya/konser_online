<?php

namespace Database\Seeders;

use App\Models\Konser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Konser::create([
            'nama' => 'Sunset di Kebun 2025',
            'poster' => 'bogoria_2023.jpg',
            'tanggal' => '2025-07-27',
            'waktu' => '16:00',
            'lokasi' => 'Kebun Raya Bogor',
            'deskripsi' => 'Konser festival musik ini sangat cocok untuk healing dan menikmati senja bersama teman-teman.'
        ]);

        Konser::create([
            'nama' => 'Rocking Jakarta 2025',
            'poster' => 'bogoria_2025.jpg',
            'tanggal' => '2025-08-15',
            'waktu' => '19:00',
            'lokasi' => 'Stadion Utama Gelora Bung Karno',
            'deskripsi' => 'Konser festival musik ini sangat cocok untuk healing dan menikmati senja bersama teman-teman.'
        ]);

        Konser::create([
            'nama' => 'Rocking Jakarta 2025',
            'poster' => 'eksplorasi_musik_2024.jpg',
            'tanggal' => '2025-08-15',
            'waktu' => '19:00',
            'lokasi' => 'Stadion Utama Gelora Bung Karno',
            'deskripsi' => 'Konser festival musik ini sangat cocok untuk healing dan menikmati senja bersama teman-teman.'
        ]);

        User::create([
            'nama_lengkap' => 'Admin Konser',
            'email' => 'admin@konser.com',
            'password' => Hash::make('admin123'),
            'role' => '0'
        ]);

        // DB::table('users')->insert([
        //     'nama_lengkap' => 'Admin Konser',
        //     'email' => 'admin@konser.com',
        //     'password' => Hash::make('admin123'),
        // ]);
    }
}
