@extends('layouts.app')

@section('page-title', 'Data Mahasiswa')
@section('page-description', 'Kelola data mahasiswa sistem informasi akademik')

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
                <h1 class="text-2xl font-semibold mb-2" style="color: #EAEFEF;">Data Mahasiswa</h1>
                <p style="color: #7F8CAA;">Kelola informasi mahasiswa dalam sistem</p>
            </div>
            <a href="{{ route('mahasiswa.create') }}" class="inline-flex items-center px-4 py-2 rounded-lg font-medium text-sm transition-all duration-300" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Mahasiswa
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total Mahasiswa</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $mahasiswa->count() }}</p>
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
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Mahasiswa Aktif</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $mahasiswa->count() }}</p>
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
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Program Studi</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $mahasiswa->pluck('prodi_id')->unique()->count() }}</p>
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
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Mahasiswa</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">NIM</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Angkatan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Program Studi</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $mhs)
                    <tr class="table-row border-b border-opacity-10 transition-colors" style="border-color: #7F8CAA;">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-medium" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;">
                                    {{ substr($mhs->nama, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-medium" style="color: #EAEFEF;">{{ $mhs->nama }}</div>
                                    <div class="text-sm" style="color: #7F8CAA;">{{ $mhs->user->username ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;">
                                {{ $mhs->nim }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm" style="color: #EAEFEF;">{{ $mhs->angkatan }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;">
                                {{ $mhs->prodi->nama ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="px-3 py-1 rounded-lg text-xs font-medium transition-colors" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;" onmouseover="this.style.background='rgba(184, 207, 206, 0.3)'" onmouseout="this.style.background='rgba(184, 207, 206, 0.2)'">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data mahasiswa ini?')" class="inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 rounded-lg text-xs font-medium transition-colors" style="background: rgba(255, 107, 107, 0.2); color: #ff6b6b;" onmouseover="this.style.background='rgba(255, 107, 107, 0.3)'" onmouseout="this.style.background='rgba(255, 107, 107, 0.2)'">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 mb-4" style="color: #7F8CAA;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <h3 class="text-sm font-medium" style="color: #EAEFEF;">Tidak ada data mahasiswa</h3>
                                <p class="text-sm" style="color: #7F8CAA;">Mulai dengan menambahkan mahasiswa baru</p>
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
