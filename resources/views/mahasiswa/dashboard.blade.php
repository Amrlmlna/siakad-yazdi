@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-white mb-2">Dashboard Mahasiswa</h1>
                    <p class="text-slate-400">Selamat datang, {{ $user->username ?? 'Mahasiswa' }}</p>
                    <div class="flex items-center gap-2 mt-3">
                        <span class="px-3 py-1 bg-slate-700/50 text-slate-300 text-sm rounded-lg border border-slate-600/50">Tahun Ajaran 2025/2026</span>
                        <span class="px-3 py-1 bg-slate-700/50 text-slate-300 text-sm rounded-lg border border-slate-600/50">Semester Genap</span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-slate-400 text-sm">Status Akademik</p>
                    <p class="text-slate-300 font-medium">Aktif</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Academic Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-700/50 rounded-lg flex items-center justify-center border border-slate-600/50">
                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Mata Kuliah Diambil</p>
                    <p class="text-white text-xl font-semibold">{{ $academicData['total_krs'] ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-700/50 rounded-lg flex items-center justify-center border border-slate-600/50">
                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">IPK Sementara</p>
                    <p class="text-white text-xl font-semibold">{{ $academicData['ipk'] ?? '0.00' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-700/50 rounded-lg flex items-center justify-center border border-slate-600/50">
                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Total SKS</p>
                    <p class="text-white text-xl font-semibold">{{ $academicData['total_sks'] ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30 mb-8">
        <h3 class="text-lg font-semibold text-white mb-6">Menu Akademik</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('krs.mahasiswa.index') }}" class="bg-slate-700/30 hover:bg-slate-600/40 rounded-lg p-4 text-center transition-all duration-300 border border-slate-600/30 hover:border-slate-500/50">
                <div class="w-10 h-10 bg-slate-600/50 rounded-lg flex items-center justify-center mx-auto mb-3 border border-slate-500/50">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <p class="text-white font-medium text-sm">KRS</p>
                <p class="text-slate-400 text-xs mt-1">Kartu Rencana Studi</p>
            </a>

            <a href="{{ route('khs.nilaiMahasiswa') }}" class="bg-slate-700/30 hover:bg-slate-600/40 rounded-lg p-4 text-center transition-all duration-300 border border-slate-600/30 hover:border-slate-500/50">
                <div class="w-10 h-10 bg-slate-600/50 rounded-lg flex items-center justify-center mx-auto mb-3 border border-slate-500/50">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <p class="text-white font-medium text-sm">KHS</p>
                <p class="text-slate-400 text-xs mt-1">Kartu Hasil Studi</p>
            </a>

            <a href="{{ route('profile.mahasiswa.index') }}" class="bg-slate-700/30 hover:bg-slate-600/40 rounded-lg p-4 text-center transition-all duration-300 border border-slate-600/30 hover:border-slate-500/50">
                <div class="w-10 h-10 bg-slate-600/50 rounded-lg flex items-center justify-center mx-auto mb-3 border border-slate-500/50">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <p class="text-white font-medium text-sm">Profil</p>
                <p class="text-slate-400 text-xs mt-1">Data Pribadi</p>
            </a>

            <div class="bg-slate-700/30 rounded-lg p-4 text-center border border-slate-600/30">
                <div class="w-10 h-10 bg-slate-600/50 rounded-lg flex items-center justify-center mx-auto mb-3 border border-slate-500/50">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-white font-medium text-sm">Jadwal</p>
                <p class="text-slate-400 text-xs mt-1">Jadwal Kuliah</p>
            </div>
        </div>
    </div>

    <!-- Academic Information -->
    <div class="bg-slate-800/30 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/30">
        <h3 class="text-lg font-semibold text-white mb-6">Informasi Akademik</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="text-base font-medium text-white mb-4">Jadwal Hari Ini</h4>
                <div class="space-y-3">
                    <div class="bg-slate-700/30 rounded-lg p-4 border border-slate-600/30">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white font-medium text-sm">Pemrograman Web</p>
                                <p class="text-slate-400 text-xs">Ruang A.101</p>
                            </div>
                            <div class="text-right">
                                <p class="text-slate-300 font-medium text-sm">08:00 - 10:00</p>
                                <p class="text-slate-400 text-xs">Kelas A</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-700/30 rounded-lg p-4 border border-slate-600/30">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white font-medium text-sm">Basis Data</p>
                                <p class="text-slate-400 text-xs">Ruang B.201</p>
                            </div>
                            <div class="text-right">
                                <p class="text-slate-300 font-medium text-sm">13:00 - 15:00</p>
                                <p class="text-slate-400 text-xs">Kelas B</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-base font-medium text-white mb-4">Pengumuman</h4>
                <div class="space-y-3">
                    <div class="bg-slate-700/30 rounded-lg p-4 border border-slate-600/30">
                        <p class="text-white font-medium text-sm mb-2">Pendaftaran KRS Semester Genap</p>
                        <p class="text-slate-400 text-xs">Periode pendaftaran KRS dibuka hingga 15 Februari 2025</p>
                        <p class="text-slate-500 text-xs mt-2">2 hari yang lalu</p>
                    </div>
                    <div class="bg-slate-700/30 rounded-lg p-4 border border-slate-600/30">
                        <p class="text-white font-medium text-sm mb-2">Ujian Tengah Semester</p>
                        <p class="text-slate-400 text-xs">UTS akan dilaksanakan pada minggu ke-8 semester</p>
                        <p class="text-slate-500 text-xs mt-2">1 minggu yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
