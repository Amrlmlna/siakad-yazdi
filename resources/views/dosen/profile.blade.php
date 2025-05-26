@extends('layouts.dosen')

@section('content')
<div class="min-h-screen p-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-playfair font-bold bg-gradient-to-r from-primary-300 via-primary-400 to-primary-500 bg-clip-text text-transparent">
                    Profile Pengguna
                </h1>
                <p class="text-slate-400">Kelola informasi akun dan pengaturan sistem</p>
            </div>
        </div>
    </div>

    <!-- Main Profile Card -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-glass rounded-2xl p-8 shadow-lg border border-primary/20">
            <!-- Profile Header -->
            <div class="flex flex-col md:flex-row items-center gap-8 mb-8">
                <!-- Avatar Section -->
                <div class="relative">
                    <div class="w-32 h-32 bg-primary rounded-full flex items-center justify-center shadow-md">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <!-- Status Indicator -->
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 rounded-full border-4 border-slate-800 flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                </div>

                <!-- User Info -->
                <div class="flex-1 text-center md:text-left">
                    <h2 class="text-3xl font-playfair font-bold text-white mb-2">{{ $user->username }}</h2>
                    <div class="flex items-center justify-center md:justify-start gap-2 mb-4">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-green-400 font-medium">Online</span>
                    </div>
                    
                    <!-- Role Badge -->
                    <div class="inline-flex items-center gap-2 bg-primary/20 border border-primary/30 rounded-full px-4 py-2 mb-4">
                        <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        <span class="text-primary-300 font-medium capitalize">{{ $user->role }}</span>
                    </div>

                    <p class="text-slate-400 text-sm">Member sejak {{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</p>
                </div>
            </div>

            <!-- Profile Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Username Card -->
                <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700/50 hover:border-primary/30 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-primary-300 font-semibold">Username</h3>
                            <p class="text-slate-400 text-sm">Identitas pengguna sistem</p>
                        </div>
                    </div>
                    <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50">
                        <p class="text-white font-medium text-lg">{{ $user->username }}</p>
                    </div>
                </div>

                <!-- Role Card -->
                <div class="bg-slate-800/50 rounded-xl p-6 border border-slate-700/50 hover:border-primary/30 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-700 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-primary-300 font-semibold">Role</h3>
                            <p class="text-slate-400 text-sm">Tingkat akses pengguna</p>
                        </div>
                    </div>
                    <div class="bg-slate-700/50 rounded-lg p-4 border border-slate-600/50">
                        <p class="text-white font-medium text-lg capitalize">{{ $user->role }}</p>
                    </div>
                </div>
            </div>

            <!-- Account Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="text-center p-6 bg-gradient-to-br from-emerald-500/10 to-emerald-600/10 rounded-xl border border-emerald-500/20">
                    <div class="w-12 h-12 bg-emerald-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-emerald-300 font-semibold mb-1">Status Akun</h4>
                    <p class="text-white font-bold">Aktif</p>
                </div>

                <div class="text-center p-6 bg-gradient-to-br from-blue-500/10 to-blue-600/10 rounded-xl border border-blue-500/20">
                    <div class="w-12 h-12 bg-blue-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-blue-300 font-semibold mb-1">Last Login</h4>
                    <p class="text-white font-bold">{{ now()->format('d M Y') }}</p>
                </div>

                <div class="text-center p-6 bg-gradient-to-br from-primary-500/10 to-primary-600/10 rounded-xl border border-primary/20">
                    <div class="w-12 h-12 bg-primary rounded-full mx-auto mb-3 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h4 class="text-primary-300 font-semibold mb-1">Privileges</h4>
                    <p class="text-white font-bold">Premium</p>
                </div>
            </div>

            <!-- Security Section -->
            <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 rounded-xl p-6 border border-slate-600/50 mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-green-300 font-semibold">Keamanan Akun</h3>
                        <p class="text-slate-400 text-sm">Akun Anda dilindungi dengan enkripsi tingkat tinggi</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm">
                    <div>
                        <div class="text-green-400 font-bold">256-bit</div>
                        <div class="text-slate-400">Encryption</div>
                    </div>
                    <div>
                        <div class="text-green-400 font-bold">2FA</div>
                        <div class="text-slate-400">Ready</div>
                    </div>
                    <div>
                        <div class="text-green-400 font-bold">SSL</div>
                        <div class="text-slate-400">Secured</div>
                    </div>
                    <div>
                        <div class="text-green-400 font-bold">24/7</div>
                        <div class="text-slate-400">Monitoring</div>
                    </div>
                </div>
            </div>

            <!-- Logout Section -->
            <div class="flex justify-center">
                <form action="{{ route("auth.logout") }}" method="POST">
                    @CSRF
                    @method("delete")
                    <button type="submit"
                            class="group inline-flex items-center gap-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 hover:scale-105 shadow-md">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Logout Sistem
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
