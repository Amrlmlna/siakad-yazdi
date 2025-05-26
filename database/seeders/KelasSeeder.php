<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\Matakuliah;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $matakuliahs = Matakuliah::all();
        $ruangans = ['Lab Komputer 1', 'Lab Komputer 2', 'Ruang 301', 'Ruang 302', 'Ruang 303', 'Lab Jaringan'];
        
        $kelas = [];

        foreach ($matakuliahs as $mk) {
            // Buat 2 kelas untuk setiap mata kuliah
            for ($i = 1; $i <= 2; $i++) {
                $kelas[] = [
                    'kode_kelas' => $mk->kode . '-' . chr(64 + $i), // TIF101-A, TIF101-B, etc.
                    'ruangan' => $ruangans[array_rand($ruangans)],
                    'mata_kuliah_id' => $mk->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Kelas::insert($kelas);
    }
}
