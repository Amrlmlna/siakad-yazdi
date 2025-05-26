@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Kartu Rencana Studi (KRS)</h1>
                    <p class="text-slate-400">Daftar mata kuliah yang diambil semester ini</p>
                </div>
                <a href="{{ route('krs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Mata Kuliah
                </a>
            </div>
        </div>
    </div>

    <!-- KRS Summary -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Total KRS</p>
                    <p class="text-white text-2xl font-bold">{{ $krs->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Total SKS</p>
                    <p class="text-white text-2xl font-bold">24</p>
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
                    <p class="text-white text-2xl font-bold">Genap</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Status</p>
                    <p class="text-white text-lg font-bold">Aktif</p>
                </div>
            </div>
        </div>
    </div>

    <!-- KRS Table -->
    <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl border border-slate-700/50 overflow-hidden">
        <div class="p-6 border-b border-slate-700/50">
            <h3 class="text-xl font-semibold text-white">Daftar Mata Kuliah</h3>
            <p class="text-slate-400 text-sm mt-1">Semester Genap 2025/2026</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-700/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Mata Kuliah</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">SKS</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Jadwal</th>
                        <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-600/50">
                    @forelse ($krs as $item)
                    <tr class="hover:bg-slate-700/30 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                                    {{ substr($item->jadwal->kelas->mata_kuliah->nama ?? 'M', 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-white font-medium">{{ $item->jadwal->kelas->mata_kuliah->nama ?? '-' }}</p>
                                    <p class="text-slate-400 text-sm">{{ $item->jadwal->kelas->mata_kuliah->kode ?? '' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-slate-700 text-white text-sm rounded-full">
                                {{ $item->jadwal->kelas->kode_kelas ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-white font-medium">{{ $item->jadwal->kelas->mata_kuliah->sks ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="text-center">
                                <p class="text-white text-sm">{{ $item->jadwal->hari ?? '-' }}</p>
                                <p class="text-slate-400 text-xs">{{ $item->jadwal->jam_mulai ?? '' }} - {{ $item->jadwal->jam_selesai ?? '' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('krs.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus mata kuliah ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center gap-1 mx-auto">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Mata Kuliah</h3>
                                <p class="text-slate-400 mb-4">Anda belum mengambil mata kuliah untuk semester ini.</p>
                                <a href="{{ route('krs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                    Tambah Mata Kuliah
                                </a>
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
