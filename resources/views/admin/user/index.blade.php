@extends('layouts.app')

@section('page-title', 'Data User')
@section('page-description', 'Kelola informasi pengguna dalam sistem')

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
                <h2 class="text-2xl font-bold mb-2" style="color: #EAEFEF;">Data User</h2>
                <p style="color: #7F8CAA;">Kelola informasi pengguna dalam sistem</p>
            </div>
            <a href="{{ route('user.create') }}" class="inline-flex items-center px-4 py-2 rounded-lg font-medium text-sm transition-all duration-300" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah User
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="stats-card rounded-xl p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total User</p>
                    <p class="text-2xl font-bold" style="color: #EAEFEF;">{{ count($users) }}</p>
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
                    <p class="text-sm font-medium" style="color: #7F8CAA;">User Aktif</p>
                    <p class="text-2xl font-bold" style="color: #EAEFEF;">{{ count($users) }}</p>
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
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total Role</p>
                    <p class="text-2xl font-bold" style="color: #EAEFEF;">3</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="glass-card rounded-2xl p-6">
        <h3 class="text-xl font-semibold mb-6" style="color: #EAEFEF;">Daftar User</h3>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-opacity-20" style="border-color: #7F8CAA;">
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider" style="color: #7F8CAA;">No</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider" style="color: #7F8CAA;">Username</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider" style="color: #7F8CAA;">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider" style="color: #7F8CAA;">Role</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider" style="color: #7F8CAA;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                    <tr class="table-row border-b border-opacity-10 transition-colors" style="border-color: #7F8CAA;">
                        <td class="px-6 py-4">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center font-semibold text-sm" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;">
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-semibold" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;">
                                    {{ strtoupper(substr($u->username, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-medium" style="color: #EAEFEF;">{{ $u->username }}</p>
                                    <p class="text-sm" style="color: #7F8CAA;">{{ $u->role }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium" style="color: #EAEFEF;">
                                @if ($u->role == 'mahasiswa' && $u->mahasiswa)
                                    {{ $u->mahasiswa->nama }}
                                @elseif ($u->role == 'dosen' && $u->dosen)
                                    {{ $u->dosen->nama }}
                                @else
                                    <span class="italic" style="color: #7F8CAA;">Nama tidak ditemukan</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;">
                                {{ $u->role }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('user.edit', $u->id) }}" class="px-3 py-1 rounded-lg text-xs font-medium transition-colors" style="background: rgba(184, 207, 206, 0.2); color: #B8CFCE;" onmouseover="this.style.background='rgba(184, 207, 206, 0.3)'" onmouseout="this.style.background='rgba(184, 207, 206, 0.2)'">
                                    Edit
                                </a>
                                <form action="{{ route('user.destroy', $u->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus user ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 rounded-lg text-xs font-medium transition-colors" style="background: rgba(255, 107, 107, 0.2); color: #ff6b6b;" onmouseover="this.style.background='rgba(255, 107, 107, 0.3)'" onmouseout="this.style.background='rgba(255, 107, 107, 0.2)'">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
