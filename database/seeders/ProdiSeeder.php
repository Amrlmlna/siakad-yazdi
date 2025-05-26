<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        $prodis = [
            [
                'nama' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Teknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Teknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Teknik Elektro',
                'fakultas' => 'Fakultas Teknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Manajemen',
                'fakultas' => 'Fakultas Ekonomi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Akuntansi',
                'fakultas' => 'Fakultas Ekonomi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Prodi::insert($prodis);
    }
}
