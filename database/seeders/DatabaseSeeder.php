<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Urutan seeding yang benar berdasarkan foreign key dependencies
        $this->call([
            UserSeeder::class,          // Harus pertama karena dosen dan mahasiswa butuh user_id
            ProdiSeeder::class,         // Kedua karena mahasiswa butuh prodi_id
            DosenSeeder::class,         // Ketiga setelah user
            MahasiswaSeeder::class,     // Keempat setelah user dan prodi
            MatakuliahSeeder::class,    // Kelima
            KelasSeeder::class,         // Keenam setelah mata kuliah
            JadwalSeeder::class,        // Ketujuh setelah kelas
        ]);
    }
}
