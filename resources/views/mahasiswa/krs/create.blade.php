@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Tambah Mata Kuliah</h1>
                    <p class="text-slate-400">Pilih mata kuliah yang ingin diambil untuk semester ini</p>
                </div>
                <a href="{{ route('krs.index') }}" class="bg-slate-600 hover:bg-slate-700 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke KRS
                </a>
            </div>
        </div>
    </div>

    <!-- Available Courses Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Mata Kuliah Tersedia</p>
                    <p class="text-white text-2xl font-bold">{{ $jadwal->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Kelas Tersedia</p>
                    <p class="text-white text-2xl font-bold">{{ $jadwal->pluck('kelas_id')->unique()->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Semester</p>
                    <p class="text-white text-lg font-bold">Genap 2026</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Available Courses Table -->
    <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl border border-slate-700/50 overflow-hidden">
        <div class="p-6 border-b border-slate-700/50">
            <h3 class="text-xl font-semibold text-white">Daftar Mata Kuliah Tersedia</h3>
            <p class="text-slate-400 text-sm mt-1">Pilih mata kuliah yang ingin diambil</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-700/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Mata Kuliah</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">SKS</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Jadwal</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Ruangan</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-600/50">
                    @forelse ($jadwal as $item)
                    <tr class="hover:bg-slate-700/30 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                                    {{ substr($item->kelas->mata_kuliah->nama ?? 'M', 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-white font-medium">{{ $item->kelas->mata_kuliah->nama ?? '-' }}</p>
                                    <p class="text-slate-400 text-sm">{{ $item->kelas->mata_kuliah->kode ?? '' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-blue-600 text-white text-sm rounded-full font-medium">
                                {{ $item->kelas->mata_kuliah->sks ?? '-' }} SKS
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-slate-700 text-white text-sm rounded-full">
                                {{ $item->kelas->kode_kelas ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="text-center">
                                <p class="text-white text-sm font-medium">{{ $item->hari ?? '-' }}</p>
                                <p class="text-slate-400 text-xs">
                                    {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') ?? '' }} - 
                                    {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') ?? '' }}
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-white text-sm">{{ $item->ruangan ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('krs.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="jadwal_id" value="{{ $item->id }}">
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-2 mx-auto">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ambil
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-2">Tidak Ada Mata Kuliah Tersedia</h3>
                                <p class="text-slate-400">Belum ada mata kuliah yang dapat diambil untuk semester ini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
