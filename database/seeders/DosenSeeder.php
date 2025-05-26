<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use App\Models\User;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        $dosenUsers = User::where('role', 'dosen')->get();
        
        $dosens = [
            [
                'user_id' => $dosenUsers[0]->id, // ahmad.fauzi
                'nip' => '198501012010011001',
                'nama' => 'Dr. Ahmad Fauzi, M.Kom',
                'bidang_keahlian' => 'Algoritma dan Pemrograman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $dosenUsers[1]->id, // siti.nurhaliza
                'nip' => '198703152012012002',
                'nama' => 'Dr. Siti Nurhaliza, M.T',
                'bidang_keahlian' => 'Jaringan Komputer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $dosenUsers[2]->id, // budi.santoso
                'nip' => '197812201998031001',
                'nama' => 'Prof. Budi Santoso, Ph.D',
                'bidang_keahlian' => 'Matematika Diskrit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $dosenUsers[3]->id, // rina.kartika
                'nip' => '198905102015042001',
                'nama' => 'Dr. Rina Kartika, M.Kom',
                'bidang_keahlian' => 'Rekayasa Perangkat Lunak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $dosenUsers[4]->id, // indra.wijaya
                'nip' => '198204081999031002',
                'nama' => 'Dr. Indra Wijaya, M.T',
                'bidang_keahlian' => 'Basis Data',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Dosen::insert($dosens);
    }
}
