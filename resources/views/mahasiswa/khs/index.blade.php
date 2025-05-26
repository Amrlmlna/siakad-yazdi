@extends('layouts.mahasiswa')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <h1 class="text-3xl font-bold text-white mb-2">Kartu Hasil Studi (KHS)</h1>
            <p class="text-slate-400">Hasil nilai dan prestasi akademik semester ini</p>
        </div>
    </div>

    <!-- Academic Summary -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Mata Kuliah</p>
                    <p class="text-white text-2xl font-bold">{{ count($khs) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">IPK Semester</p>
                    <p class="text-white text-2xl font-bold">3.75</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
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
                <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Prestasi</p>
                    <p class="text-white text-lg font-bold">Baik</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grades Table -->
    <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl border border-slate-700/50 overflow-hidden">
        <div class="p-6 border-b border-slate-700/50">
            <h3 class="text-xl font-semibold text-white">Daftar Nilai</h3>
            <p class="text-slate-400 text-sm mt-1">Semester Genap 2025/2026</p>
        </div>

        @forelse ($khs as $item)
            @if($loop->first)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-700/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Mata Kuliah</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-300 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Nilai</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-slate-300 uppercase tracking-wider">Grade</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-600/50">
            @endif
            
            <tr class="hover:bg-slate-700/30 transition-colors duration-200">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                            @if($item->krs && $item->krs->jadwal && $item->krs->jadwal->kelas && $item->krs->jadwal->kelas->mata_kuliah)
                                {{ substr($item->krs->jadwal->kelas->mata_kuliah->nama, 0, 1) }}
                            @else
                                M
                            @endif
                        </div>
                        <div>
                            <p class="text-white font-medium">
                                @if($item->krs && $item->krs->jadwal && $item->krs->jadwal->kelas && $item->krs->jadwal->kelas->mata_kuliah)
                                    {{ $item->krs->jadwal->kelas->mata_kuliah->nama }}
                                @else
                                    Data mata kuliah tidak tersedia
                                @endif
                            </p>
                            <p class="text-slate-400 text-sm">
                                @if($item->krs && $item->krs->jadwal && $item->krs->jadwal->kelas && $item->krs->jadwal->kelas->mata_kuliah)
                                    {{ $item->krs->jadwal->kelas->mata_kuliah->kode ?? 'Kode tidak tersedia' }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 bg-slate-700 text-white text-sm rounded-full">
                        @if($item->krs && $item->krs->jadwal && $item->krs->jadwal->kelas)
                            {{ $item->krs->jadwal->kelas->kode_kelas }}
                        @else
                            -
                        @endif
                    </span>
                </td>
                <td class="px-6 py-4 text-center">
                    <span class="text-white font-bold text-lg">{{ $item->nilai ?? 0 }}</span>
                </td>
                <td class="px-6 py-4 text-center">
                    @php
                        $nilai = $item->nilai ?? 0;
                        $gradeClass = '';
                        $gradeColor = '';
                        if($nilai >= 85) {
                            $gradeClass = 'A';
                            $gradeColor = 'bg-green-600 text-white';
                        } elseif($nilai >= 70) {
                            $gradeClass = 'B';
                            $gradeColor = 'bg-blue-600 text-white';
                        } elseif($nilai >= 60) {
                            $gradeClass = 'C';
                            $gradeColor = 'bg-yellow-600 text-white';
                        } elseif($nilai >= 50) {
                            $gradeClass = 'D';
                            $gradeColor = 'bg-orange-600 text-white';
                        } else {
                            $gradeClass = 'E';
                            $gradeColor = 'bg-red-600 text-white';
                        }
                    @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold {{ $gradeColor }}">
                        {{ $gradeClass }}
                    </span>
                </td>
            </tr>
            
            @if($loop->last)
                    </tbody>
                </table>
            </div>
            @endif
        @empty
            <div class="p-12 text-center">
                <div class="w-16 h-16 bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Nilai</h3>
                <p class="text-slate-400">Nilai untuk semester ini belum tersedia. Silakan tunggu pengumuman dari dosen.</p>
            </div>
        @endforelse
    </div>

    @if(count($khs) > 0)
    <!-- Grade Information -->
    <div class="bg-slate-800/50 backdrop-filter backdrop-blur-lg rounded-xl p-6 border border-slate-700/50 mt-6">
        <h3 class="text-lg font-semibold text-white mb-4">Keterangan Nilai</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center text-sm font-bold">A</span>
                <div>
                    <p class="text-white text-sm font-medium">Sangat Baik</p>
                    <p class="text-slate-400 text-xs">85 - 100</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold">B</span>
                <div>
                    <p class="text-white text-sm font-medium">Baik</p>
                    <p class="text-slate-400 text-xs">70 - 84</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 bg-yellow-600 text-white rounded-full flex items-center justify-center text-sm font-bold">C</span>
                <div>
                    <p class="text-white text-sm font-medium">Cukup</p>
                    <p class="text-slate-400 text-xs">60 - 69</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center text-sm font-bold">D</span>
                <div>
                    <p class="text-white text-sm font-medium">Kurang</p>
                    <p class="text-slate-400 text-xs">50 - 59</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm font-bold">E</span>
                <div>
                    <p class="text-white text-sm font-medium">Gagal</p>
                    <p class="text-slate-400 text-xs">< 50</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
