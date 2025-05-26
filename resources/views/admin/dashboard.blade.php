@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan sistem informasi akademik')

@section('content')
<style>
    .modern-card {
        background: rgba(51, 52, 70, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(127, 140, 170, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .modern-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(184, 207, 206, 0.15);
        border-color: rgba(184, 207, 206, 0.3);
    }
    
    .stat-icon {
        background: linear-gradient(135deg, #B8CFCE, #7F8CAA);
        color: #333446;
    }
    
    .action-card {
        background: rgba(51, 52, 70, 0.4);
        border: 1px solid rgba(127, 140, 170, 0.2);
        transition: all 0.3s ease;
    }
    
    .action-card:hover {
        background: rgba(184, 207, 206, 0.1);
        border-color: rgba(184, 207, 206, 0.3);
        transform: translateY(-2px);
    }
</style>

<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="modern-card rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold" style="color: #EAEFEF;">Selamat Datang, {{ $user->username }}</h1>
                <p class="mt-1" style="color: #7F8CAA;">Kelola sistem informasi akademik dengan mudah dan efisien</p>
            </div>
            <div class="flex items-center space-x-4 text-sm" style="color: #B8CFCE;">
                <span>Tahun Ajaran 2025/2026</span>
                <span>•</span>
                <span>Semester Genap</span>
            </div>
        </div>
    </div>
    
    <!-- Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Mahasiswa -->
        <div class="modern-card rounded-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 stat-icon rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total Mahasiswa</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ number_format($totalMahasiswa) }}</p>
                </div>
            </div>
        </div>
        
        <!-- Total Dosen -->
        <div class="modern-card rounded-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 stat-icon rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total Dosen</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ number_format($totalDosen) }}</p>
                </div>
            </div>
        </div>
        
        <!-- Total Mata Kuliah -->
        <div class="modern-card rounded-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 stat-icon rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Mata Kuliah</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ number_format($totalMatakuliah) }}</p>
                </div>
            </div>
        </div>
        
        <!-- Total Kelas -->
        <div class="modern-card rounded-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 stat-icon rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium" style="color: #7F8CAA;">Total Kelas</p>
                    <p class="text-2xl font-semibold" style="color: #EAEFEF;">{{ number_format($totalKelas) }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="modern-card rounded-lg p-6">
        <h3 class="text-lg font-medium mb-4" style="color: #EAEFEF;">Aksi Cepat</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('mahasiswa.index') }}" class="action-card group flex flex-col items-center p-4 rounded-lg">
                <div class="w-12 h-12 stat-icon rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium" style="color: #EAEFEF;">Kelola Mahasiswa</span>
            </a>
            
            <a href="{{ route('dosen.index') }}" class="action-card group flex flex-col items-center p-4 rounded-lg">
                <div class="w-12 h-12 stat-icon rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium" style="color: #EAEFEF;">Kelola Dosen</span>
            </a>
            
            <a href="{{ route('jadwal.index') }}" class="action-card group flex flex-col items-center p-4 rounded-lg">
                <div class="w-12 h-12 stat-icon rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium" style="color: #EAEFEF;">Atur Jadwal</span>
            </a>
            
            <a href="{{ route('krs.index') }}" class="action-card group flex flex-col items-center p-4 rounded-lg">
                <div class="w-12 h-12 stat-icon rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium" style="color: #EAEFEF;">Monitor KRS</span>
            </a>
        </div>
    </div>
    
    <!-- System Status -->
    <div class="modern-card rounded-lg p-6">
        <h3 class="text-lg font-medium mb-4" style="color: #EAEFEF;">Status Sistem</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: rgba(34, 197, 94, 0.2);">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium" style="color: #EAEFEF;">Server Online</p>
                    <p class="text-sm" style="color: #7F8CAA;">99.9% Uptime</p>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 stat-icon rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium" style="color: #EAEFEF;">Database</p>
                    <p class="text-sm" style="color: #7F8CAA;">Optimal</p>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 stat-icon rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium" style="color: #EAEFEF;">Keamanan</p>
                    <p class="text-sm" style="color: #7F8CAA;">Terlindungi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="modern-card rounded-lg p-6">
        <h3 class="text-lg font-medium mb-4" style="color: #EAEFEF;">Aktivitas Terbaru</h3>
        <div class="space-y-4">
            @forelse($recentActivities as $activity)
            <div class="flex items-center space-x-4 p-3 rounded-lg" style="background: rgba(127, 140, 170, 0.1);">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 stat-icon rounded-lg flex items-center justify-center">
                        @if($activity['icon'] == 'user-plus')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        @elseif($activity['icon'] == 'user-check')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        @endif
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium" style="color: #EAEFEF;">{{ $activity['action'] }}</p>
                    <p class="text-sm truncate" style="color: #B8CFCE;">{{ $activity['description'] }}</p>
                </div>
                <div class="flex-shrink-0">
                    <p class="text-xs" style="color: #7F8CAA;">{{ $activity['time']->diffForHumans() }}</p>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <p style="color: #7F8CAA;">Belum ada aktivitas terbaru</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
