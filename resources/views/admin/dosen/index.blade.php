@extends('layouts.app')

@section('page-title', 'Data Dosen')
@section('page-description', 'Kelola data dosen sistem informasi akademik')

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
                <h1 class="text-2xl font-semibold mb-2" style="color: #EAEFEF;">Data Dosen</h1>
                <p style="color: #7F8CAA;">Kelola informasi dosen dalam sistem</p>
            </div>
            <a href="{{ route('dosen.create') }}" class="inline-flex items-center px-4 py-2 rounded-lg font-medium text-sm transition-all duration-300" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Dosen
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total Dosen</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $dosen->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Dosen Aktif</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $dosen->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Bidang Keahlian</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $dosen->pluck('bidang_keahlian')->unique()->count() }}</p>
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
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Dosen</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">NIP</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Bidang Keahlian</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dosen as $d)
                    <tr class="table-row border-b border-opacity-10 transition-colors" style="border-color: #7F8CAA;">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-medium" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;">
                                    {{ substr($d->nama, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-medium" style="color: #EAEFEF;">{{ $d->nama }}</div>
                                    <div class="text-sm" style="color: #7F8CAA;">{{ $d->user->username ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;">
                                {{ $d->nip }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;">
                                {{ $d->bidang_keahlian }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('dosen.edit', $d->id) }}" class="px-3 py-1 rounded-lg text-xs font-medium transition-colors" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;" onmouseover="this.style.background='rgba(184, 207, 206, 0.3)'" onmouseout="this.style.background='rgba(184, 207, 206, 0.2)'">Edit</a>
                                <form action="{{ route('dosen.destroy', $d->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data dosen ini?')" class="inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 rounded-lg text-xs font-medium transition-colors" style="background: rgba(255, 107, 107, 0.2); color: #ff6b6b;" onmouseover="this.style.background='rgba(255, 107, 107, 0.3)'" onmouseout="this.style.background='rgba(255, 107, 107, 0.2)'">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 mb-4" style="color: #7F8CAA;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <h3 class="text-sm font-medium" style="color: #EAEFEF;">Tidak ada data dosen</h3>
                                <p class="text-sm" style="color: #7F8CAA;">Mulai dengan menambahkan dosen baru</p>
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
