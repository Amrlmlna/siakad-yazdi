<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\KRS;
use App\Models\KHS;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalUsers = User::count();
        $totalMahasiswa = Mahasiswa::count();
        $totalDosen = Dosen::count();
        $totalJadwal = Jadwal::count();

        // Recent activities with proper timestamps
        $recentActivities = collect([
            [
                'action' => 'User baru terdaftar',
                'details' => 'Mahasiswa dengan NIM 2024001 telah mendaftar',
                'timestamp' => now()->subHours(2),
                'type' => 'user'
            ],
            [
                'action' => 'Jadwal kuliah ditambahkan',
                'details' => 'Mata kuliah Pemrograman Web - Kelas A',
                'timestamp' => now()->subHours(5),
                'type' => 'schedule'
            ],
            [
                'action' => 'Nilai KHS diperbarui',
                'details' => 'Dosen telah menginput nilai untuk 25 mahasiswa',
                'timestamp' => now()->subDay(),
                'type' => 'grade'
            ],
            [
                'action' => 'Data mahasiswa diperbarui',
                'details' => 'Profil mahasiswa NIM 2023045 telah diperbarui',
                'timestamp' => now()->subDays(2),
                'type' => 'update'
            ]
        ]);

        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalMahasiswa', 
            'totalDosen', 
            'totalJadwal',
            'recentActivities'
        ));
    }

    public function mahasiswa()
    {
        $user = Auth::user();
        
        // Get mahasiswa data
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        
        // Get academic data if mahasiswa exists
        $academicData = [];
        if ($mahasiswa) {
            $academicData = [
                'total_krs' => KRS::where('mahasiswa_id', $mahasiswa->id)->count(),
                'total_khs' => KHS::whereHas('krs', function($query) use ($mahasiswa) {
                    $query->where('mahasiswa_id', $mahasiswa->id);
                })->count(),
                'ipk' => 3.75, // This should be calculated from actual grades
                'total_sks' => 24 // This should be calculated from KRS
            ];
        }

        return view('mahasiswa.dashboard', compact('user', 'academicData'));
    }

    public function dosen()
    {
        $user = Auth::user();
        
        // Get dosen data
        $dosen = Dosen::where('user_id', $user->id)->first();
        
        // Get teaching data if dosen exists
        $teachingData = [];
        if ($dosen) {
            $teachingData = [
                'total_jadwal' => Jadwal::where('dosen_id', $dosen->id)->count(),
                'total_mahasiswa' => KRS::whereHas('jadwal', function($query) use ($dosen) {
                    $query->where('dosen_id', $dosen->id);
                })->distinct('mahasiswa_id')->count(),
                'total_kelas' => Jadwal::where('dosen_id', $dosen->id)->distinct('kelas_id')->count()
            ];
        }

        return view('dosen.dashboard', compact('user', 'teachingData'));
    }
}
