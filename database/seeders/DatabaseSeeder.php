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
            'deskripsi' => 'Koplove Festival 2025 siap membuat Stadion Pakansari bergetar! Dengan line-up dahsyat seperti NDX A.K.A, Happy Asmara, Mr. Jono & Joni, Guyon Waton, hingga Gildcoustic, siapkan dirimu untuk ambyar massal. Musik koplo, dangdut remix, dan atmosfer pesta rakyat akan membuatmu berjingkrak tanpa henti. Ajak seluruh pasukanmu dan rasakan semangatnya. Tiket sudah tersedia, sikat habis!'
        ]);

        Konser::create([
            'nama' => 'Rocking Jakarta 2025',
            'poster' => 'bogoria_2025.jpg',
            'tanggal' => '2025-08-15',
            'waktu' => '18:00',
            'lokasi' => 'Stadion Utama Gelora Bung Karno',
            'deskripsi' => 'Pekan Raya Nako 2025 kembali! Nikmati penampilan memukau dari Adhitia Sofyan, Rimaldi, Bernadya, Endah N Rhesa, dan Ambarila, sambil menjelajahi bazar kreatif dengan tenant fashion, tattoo, hingga tanaman. Bertempat di Kopi Nako Kebon Jati yang nyaman, ini adalah tempat terbaik untuk healing, nongkrong, dan menikmati sore yang inspiratif. Tiket terbatas, jangan sampai kehabisan!'
        ]);

        Konser::create([
            'nama' => 'Rocking Jakarta 2025',
            'poster' => 'eksplorasi_musik_2024.jpg',
            'tanggal' => '2025-08-15',
            'waktu' => '19:00',
            'lokasi' => 'Stadion Utama Gelora Bung Karno',
            'deskripsi' => 'Festival Dwiwarna Nawasena 2025 adalah ledakan kreativitas anak muda! Menghadirkan penampilan spesial dari Jordan Susanto, HIVI!, dan Yovie & Nuno. Saksikan panggung meriah dengan dekorasi penuh warna dan nuansa retro modern yang memukau. Diselenggarakan di area terbuka hijau yang luas di Bogor Selatan, festival ini sempurna untuk menikmati musik berkualitas sambil bersantai. Jangan lewatkan gelaran epik ini, dapatkan tiketmu segera!'
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
