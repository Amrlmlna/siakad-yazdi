@extends('layouts.app')

@section('page-title', 'Data KRS')
@section('page-description', 'Kelola data KRS sistem informasi akademik')

@section('content')
<style>
    .glass-card {
        backdrop-filter: blur(20px);
        background: rgba(51, 52, 70, 0.6);
        border: 1px solid rgba(127, 140, 170, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .stats-card {
        backdrop-filter: blur(20px);
        background: rgba(51, 52, 70, 0.4);
        border: 1px solid rgba(127, 140, 170, 0.2);
        transition: all 0.3s ease;
    }
    
    .stats-card:hover {
        transform: translateY(-2px);
        background: rgba(51, 52, 70, 0.6);
        border-color: rgba(184, 207, 206, 0.3);
    }
    
    .table-row:hover {
        background: rgba(184, 207, 206, 0.05);
    }
</style>

<div class="space-y-6">
    <!-- Header Section -->
    <div class="glass-card rounded-2xl p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-semibold mb-2" style="color: #EAEFEF;">Data KRS</h1>
                <p style="color: #7F8CAA;">Kelola data KRS sistem informasi akademik</p>
            </div>
            <a href="{{ route('krs.create') }}" class="inline-flex items-center px-4 py-2 rounded-lg font-medium text-sm transition-all duration-300" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah KRS
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total KRS</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $krs->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Mahasiswa Terdaftar</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $krs->pluck('mahasiswa_id')->unique()->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Mata Kuliah</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $krs->pluck('jadwal.kelas.mata_kuliah_id')->unique()->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Tahun Ajaran</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $krs->pluck('tahun_ajaran')->unique()->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-opacity-20" style="border-color: #7F8CAA;">
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">No</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Mahasiswa</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Mata Kuliah</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Kelas</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Tahun Ajaran</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Semester</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($krs as $item)
                    <tr class="table-row border-b border-opacity-10 transition-colors" style="border-color: #7F8CAA;">
                        <td class="px-6 py-4">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;">
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium" style="color: #EAEFEF;">{{ $item->mahasiswa->nama ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;">
                                    {{ substr($item->jadwal->kelas->mata_kuliah->nama ?? 'M', 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-medium" style="color: #EAEFEF;">{{ $item->jadwal->kelas->mata_kuliah->nama ?? '-' }}</p>
                                    <p class="text-sm" style="color: #7F8CAA;">{{ $item->jadwal->kelas->mata_kuliah->kode ?? '' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded flex items-center justify-center text-xs font-bold" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;">
                                    {{ substr($item->jadwal->kelas->kode_kelas ?? 'K', 0, 1) }}
                                </div>
                                <span style="color: #EAEFEF;">{{ $item->jadwal->kelas->kode_kelas ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm" style="color: #EAEFEF;">
                            {{ $item->tahun_ajaran }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;">
                                {{ $item->jadwal->kelas->mata_kuliah->semester ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('krs.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 rounded-lg text-xs font-medium transition-colors flex items-center gap-1" style="background: rgba(255, 107, 107, 0.2); color: #ff6b6b;" onmouseover="this.style.background='rgba(255, 107, 107, 0.3)'" onmouseout="this.style.background='rgba(255, 107, 107, 0.2)'">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
