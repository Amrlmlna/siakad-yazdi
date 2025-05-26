<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Admin users
            [
                'username' => 'amirul',
                'email' => 'amirul@gmail.com',
                'password' => Hash::make('devtestnet1'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'rafi rabbani',
                'email' => 'rafi@gmail.com',
                'password' => Hash::make('devtestnet2'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Dosen users
            [
                'username' => 'ahmad.fauzi',
                'email' => 'ahmad.fauzi@university.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'siti.nurhaliza',
                'email' => 'siti.nurhaliza@university.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'budi.santoso',
                'email' => 'budi.santoso@university.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'rina.kartika',
                'email' => 'rina.kartika@university.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'indra.wijaya',
                'email' => 'indra.wijaya@university.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Mahasiswa users
            [
                'username' => 'andi.pratama',
                'email' => 'andi.pratama@student.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'sari.dewi',
                'email' => 'sari.dewi@student.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'budi.setiawan',
                'email' => 'budi.setiawan@student.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'rina.sari',
                'email' => 'rina.sari@student.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'doni.kurniawan',
                'email' => 'doni.kurniawan@student.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($users);
    }
}
