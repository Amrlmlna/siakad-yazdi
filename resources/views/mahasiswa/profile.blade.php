@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Profil Mahasiswa</h1>
                    <p class="text-slate-400">Informasi akun dan data pribadi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Information -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Account Information -->
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <h3 class="text-xl font-semibold text-white mb-6">Informasi Akun</h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Nama Pengguna</label>
                    <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50">
                        <p class="text-white font-medium">{{ $user->username ?? 'Tidak tersedia' }}</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Peran</label>
                    <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-600 text-white font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            {{ ucfirst($user->role ?? 'mahasiswa') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Status -->
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <h3 class="text-xl font-semibold text-white mb-6">Status Akademik</h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Status</label>
                    <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-600 text-white font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Aktif
                        </span>
                    </div>
                </div>
                
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Tahun Ajaran</label>
                    <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50">
                        <p class="text-white font-medium">2025/2026 - Semester Genap</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Academic Statistics -->
    <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50 mb-8">
        <h3 class="text-xl font-semibold text-white mb-6">Statistik Akademik</h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50 text-center">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <p class="text-white text-2xl font-bold">8</p>
                <p class="text-slate-400 text-sm">Mata Kuliah</p>
            </div>

            <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50 text-center">
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <p class="text-white text-2xl font-bold">3.75</p>
                <p class="text-slate-400 text-sm">IPK</p>
            </div>

            <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50 text-center">
                <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <p class="text-white text-2xl font-bold">24</p>
                <p class="text-slate-400 text-sm">Total SKS</p>
            </div>

            <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50 text-center">
                <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-white text-2xl font-bold">6</p>
                <p class="text-slate-400 text-sm">Semester</p>
            </div>
        </div>
    </div>

    <!-- Logout Section -->
    <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-xl font-semibold text-white mb-2">Keluar Sistem</h3>
                <p class="text-slate-400">Akhiri sesi dan kembali ke halaman login</p>
            </div>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-300 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
