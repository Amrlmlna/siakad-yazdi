<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\Kelas;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = Kelas::all();
        $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jamMulai = ['08:00', '10:00', '13:00', '15:00'];
        $jamSelesai = ['09:40', '11:40', '14:40', '16:40'];
        
        $jadwals = [];

        foreach ($kelas as $k) {
            $randomHari = $haris[array_rand($haris)];
            $randomJamIndex = array_rand($jamMulai);
            
            $jadwals[] = [
                'kelas_id' => $k->id,
                'hari' => $randomHari,
                'jam_mulai' => $jamMulai[$randomJamIndex],
                'jam_selesai' => $jamSelesai[$randomJamIndex],
                'ruangan' => $k->ruangan,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Jadwal::insert($jadwals);
    }
}
