<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $matakuliahs = [
            // Teknik Informatika - Semester Ganjil
            [
                'kode' => 'TIF101',
                'nama' => 'Algoritma dan Pemrograman',
                'sks' => 3,
                'semester' => 'ganjil',
                'dosen_pengampu' => 'Dr. Ahmad Fauzi, M.Kom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'TIF103',
                'nama' => 'Matematika Diskrit',
                'sks' => 3,
                'semester' => 'ganjil',
                'dosen_pengampu' => 'Prof. Budi Santoso, Ph.D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'TIF105',
                'nama' => 'Struktur Data',
                'sks' => 3,
                'semester' => 'ganjil',
                'dosen_pengampu' => 'Dr. Rina Kartika, M.Kom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'TIF107',
                'nama' => 'Basis Data',
                'sks' => 3,
                'semester' => 'ganjil',
                'dosen_pengampu' => 'Dr. Indra Wijaya, M.T',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Teknik Informatika - Semester Genap
            [
                'kode' => 'TIF102',
                'nama' => 'Pemrograman Berorientasi Objek',
                'sks' => 3,
                'semester' => 'genap',
                'dosen_pengampu' => 'Dr. Ahmad Fauzi, M.Kom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'TIF104',
                'nama' => 'Jaringan Komputer',
                'sks' => 3,
                'semester' => 'genap',
                'dosen_pengampu' => 'Dr. Siti Nurhaliza, M.T',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'TIF106',
                'nama' => 'Rekayasa Perangkat Lunak',
                'sks' => 3,
                'semester' => 'genap',
                'dosen_pengampu' => 'Dr. Rina Kartika, M.Kom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'TIF108',
                'nama' => 'Sistem Operasi',
                'sks' => 3,
                'semester' => 'genap',
                'dosen_pengampu' => 'Dr. Indra Wijaya, M.T',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Sistem Informasi - Semester Ganjil
            [
                'kode' => 'SIF101',
                'nama' => 'Pengantar Sistem Informasi',
                'sks' => 3,
                'semester' => 'ganjil',
                'dosen_pengampu' => 'Dr. Siti Nurhaliza, M.T',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'SIF103',
                'nama' => 'Analisis dan Perancangan Sistem',
                'sks' => 3,
                'semester' => 'ganjil',
                'dosen_pengampu' => 'Prof. Budi Santoso, Ph.D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'SIF105',
                'nama' => 'Manajemen Basis Data',
                'sks' => 3,
                'semester' => 'ganjil',
                'dosen_pengampu' => 'Dr. Indra Wijaya, M.T',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Sistem Informasi - Semester Genap
            [
                'kode' => 'SIF102',
                'nama' => 'Pemrograman Web',
                'sks' => 3,
                'semester' => 'genap',
                'dosen_pengampu' => 'Dr. Ahmad Fauzi, M.Kom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'SIF104',
                'nama' => 'E-Business',
                'sks' => 3,
                'semester' => 'genap',
                'dosen_pengampu' => 'Dr. Rina Kartika, M.Kom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'SIF106',
                'nama' => 'Audit Sistem Informasi',
                'sks' => 3,
                'semester' => 'genap',
                'dosen_pengampu' => 'Dr. Siti Nurhaliza, M.T',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Matakuliah::insert($matakuliahs);
    }
}
