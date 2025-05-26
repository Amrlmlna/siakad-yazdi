<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $prodiTI = Prodi::where('nama', 'Teknik Informatika')->first();
        $prodiSI = Prodi::where('nama', 'Sistem Informasi')->first();
        $mahasiswaUsers = User::where('role', 'mahasiswa')->get();

        $mahasiswas = [
            [
                'user_id' => $mahasiswaUsers[0]->id, // andi.pratama
                'nim' => '2021001001',
                'nama' => 'Andi Pratama',
                'angkatan' => '2021',
                'prodi_id' => $prodiTI->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $mahasiswaUsers[1]->id, // sari.dewi
                'nim' => '2021001002',
                'nama' => 'Sari Dewi',
                'angkatan' => '2021',
                'prodi_id' => $prodiTI->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $mahasiswaUsers[2]->id, // budi.setiawan
                'nim' => '2021001003',
                'nama' => 'Budi Setiawan',
                'angkatan' => '2021',
                'prodi_id' => $prodiSI->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $mahasiswaUsers[3]->id, // rina.sari
                'nim' => '2021001004',
                'nama' => 'Rina Sari',
                'angkatan' => '2021',
                'prodi_id' => $prodiSI->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $mahasiswaUsers[4]->id, // doni.kurniawan
                'nim' => '2021001005',
                'nama' => 'Doni Kurniawan',
                'angkatan' => '2021',
                'prodi_id' => $prodiTI->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Mahasiswa::insert($mahasiswas);
    }
}
