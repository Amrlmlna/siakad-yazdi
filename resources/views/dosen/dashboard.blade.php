@extends('layouts.dosen')

@section('content')
<div class="min-h-screen p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-white mb-2">Dashboard Dosen</h1>
                    <p class="text-slate-400">Selamat datang, {{ $user->username ?? 'Dosen' }}</p>
                    <div class="flex items-center gap-2 mt-3">
                        <span class="px-3 py-1 bg-slate-700/50 text-slate-300 text-sm rounded-lg border border-slate-600/50">Tahun Ajaran 2025/2026</span>
                        <span class="px-3 py-1 bg-slate-700/50 text-slate-300 text-sm rounded-lg border border-slate-600/50">Semester Genap</span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-slate-400 text-sm">Status</p>
                    <p class="text-slate-300 font-medium">Aktif Mengajar</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-700/50 rounded-lg flex items-center justify-center border border-slate-600/50">
                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Mata Kuliah Diampu</p>
                    <p class="text-white text-xl font-semibold">{{ $teachingData['total_jadwal'] ?? '0' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-700/50 rounded-lg flex items-center justify-center border border-slate-600/50">
                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Total Mahasiswa</p>
                    <p class="text-white text-xl font-semibold">{{ $teachingData['total_mahasiswa'] ?? '0' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-700/50 rounded-lg flex items-center justify-center border border-slate-600/50">
                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Kelas Aktif</p>
                    <p class="text-white text-xl font-semibold">{{ $teachingData['total_kelas'] ?? '0' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30 mb-8">
        <h3 class="text-lg font-semibold text-white mb-6">Menu Utama</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('dosen.absensi.index') }}" class="bg-slate-700/30 hover:bg-slate-600/40 rounded-lg p-4 text-center transition-all duration-300 border border-slate-600/30 hover:border-slate-500/50">
                <div class="w-10 h-10 bg-slate-600/50 rounded-lg flex items-center justify-center mx-auto mb-3 border border-slate-500/50">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-white font-medium text-sm">Absensi</p>
                <p class="text-slate-400 text-xs mt-1">Kelola kehadiran</p>
            </a>

            <a href="{{ route('dosen.khs.index') }}" class="bg-slate-700/30 hover:bg-slate-600/40 rounded-lg p-4 text-center transition-all duration-300 border border-slate-600/30 hover:border-slate-500/50">
                <div class="w-10 h-10 bg-slate-600/50 rounded-lg flex items-center justify-center mx-auto mb-3 border border-slate-500/50">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <p class="text-white font-medium text-sm">Input Nilai</p>
                <p class="text-slate-400 text-xs mt-1">Kelola penilaian</p>
            </a>

            <a href="{{ route('profile.dosen.index') }}" class="bg-slate-700/30 hover:bg-slate-600/40 rounded-lg p-4 text-center transition-all duration-300 border border-slate-600/30 hover:border-slate-500/50">
                <div class="w-10 h-10 bg-slate-600/50 rounded-lg flex items-center justify-center mx-auto mb-3 border border-slate-500/50">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <p class="text-white font-medium text-sm">Profil</p>
                <p class="text-slate-400 text-xs mt-1">Data Dosen</p>
            </a>

            <div class="bg-slate-700/30 rounded-lg p-4 text-center border border-slate-600/30">
                <div class="w-10 h-10 bg-slate-600/50 rounded-lg flex items-center justify-center mx-auto mb-3 border border-slate-500/50">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-white font-medium text-sm">Jadwal</p>
                <p class="text-slate-400 text-xs mt-1">Jadwal Mengajar</p>
            </div>
        </div>
    </div>

    <!-- Teaching Schedule -->
    <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
        <h3 class="text-lg font-semibold text-white mb-6">Jadwal Mengajar Hari Ini</h3>
        <div class="space-y-3">
            <div class="bg-slate-700/30 rounded-lg p-4 border border-slate-600/30">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-white font-medium">Pemrograman Web</p>
                        <p class="text-slate-400 text-sm">Kelas A - Ruang A.101</p>
                        <p class="text-slate-400 text-sm">25 Mahasiswa</p>
                    </div>
                    <div class="text-right">
                        <p class="text-slate-300 font-medium">08:00 - 10:00</p>
                        <span class="inline-block px-2 py-1 bg-slate-600/50 text-slate-300 text-xs rounded border border-slate-500/50 mt-1">Aktif</span>
                    </div>
                </div>
            </div>

            <div class="bg-slate-700/30 rounded-lg p-4 border border-slate-600/30">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-white font-medium">Basis Data</p>
                        <p class="text-slate-400 text-sm">Kelas B - Ruang B.201</p>
                        <p class="text-slate-400 text-sm">30 Mahasiswa</p>
                    </div>
                    <div class="text-right">
                        <p class="text-slate-300 font-medium">13:00 - 15:00</p>
                        <span class="inline-block px-2 py-1 bg-slate-600/50 text-slate-300 text-xs rounded border border-slate-500/50 mt-1">Mendatang</span>
                    </div>
                </div>
            </div>

            <div class="bg-slate-700/30 rounded-lg p-4 border border-slate-600/30">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-white font-medium">Algoritma Pemrograman</p>
                        <p class="text-slate-400 text-sm">Kelas C - Ruang C.301</p>
                        <p class="text-slate-400 text-sm">28 Mahasiswa</p>
                    </div>
                    <div class="text-right">
                        <p class="text-slate-300 font-medium">15:30 - 17:30</p>
                        <span class="inline-block px-2 py-1 bg-slate-600/50 text-slate-300 text-xs rounded border border-slate-500/50 mt-1">Mendatang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
