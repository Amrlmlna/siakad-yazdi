@extends('layouts.app')

@section('page-title', 'Data Program Studi')
@section('page-description', 'Kelola data program studi sistem informasi akademik')

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
                <h1 class="text-2xl font-semibold mb-2" style="color: #EAEFEF;">Data Program Studi</h1>
                <p style="color: #7F8CAA;">Kelola informasi program studi dalam sistem</p>
            </div>
            <a href="{{ route('prodi.create') }}" class="inline-flex items-center px-4 py-2 rounded-lg font-medium text-sm transition-all duration-300" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Prodi
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total Program Studi</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $prodi->count() }}</p>
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
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Prodi Aktif</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $prodi->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total Fakultas</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ $prodi->pluck('fakultas')->unique()->count() }}</p>
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
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Nama Program Studi</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Fakultas</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider" style="color: #7F8CAA;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prodi as $prodis)
                    <tr class="table-row border-b border-opacity-10 transition-colors" style="border-color: #7F8CAA;">
                        <td class="px-6 py-4 text-sm" style="color: #EAEFEF;">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium" style="color: #EAEFEF;">{{ $prodis->nama }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;">
                                {{ $prodis->fakultas }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('prodi.edit', $prodis->id) }}" class="px-3 py-1 rounded-lg text-xs font-medium transition-colors" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;" onmouseover="this.style.background='rgba(184, 207, 206, 0.3)'" onmouseout="this.style.background='rgba(184, 207, 206, 0.2)'">Edit</a>
                                <form action="{{ route('prodi.destroy', $prodis->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data program studi ini?')" class="inline">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <h3 class="text-sm font-medium" style="color: #EAEFEF;">Tidak ada data program studi</h3>
                                <p class="text-sm" style="color: #7F8CAA;">Mulai dengan menambahkan program studi baru</p>
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
