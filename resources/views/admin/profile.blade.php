@extends('layouts.app')

@section('page-title', 'Profile')
@section('page-description', 'Kelola informasi profil Anda')

@section('content')
<style>
    .glass-card {
        backdrop-filter: blur(20px);
        background: rgba(51, 52, 70, 0.6);
        border: 1px solid rgba(127, 140, 170, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .gradient-border {
        background: linear-gradient(135deg, #B8CFCE, #7F8CAA);
        padding: 2px;
        border-radius: 20px;
    }
    
    .inner-card {
        background: #333446;
        border-radius: 18px;
        padding: 2rem;
    }
</style>

<div class="min-h-screen p-4 md:p-6 lg:p-8 flex items-center justify-center">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-40 h-40 rounded-full blur-3xl" style="background: #B8CFCE;"></div>
        <div class="absolute bottom-0 right-0 w-60 h-60 rounded-full blur-3xl" style="background: #7F8CAA;"></div>
        <div class="absolute top-1/2 left-1/2 w-32 h-32 rounded-full blur-3xl" style="background: #B8CFCE;"></div>
    </div>

    <div class="relative z-10 w-full max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="floating-animation inline-block mb-6 relative">
                <div class="gradient-border">
                    <div class="w-32 h-32 rounded-full flex items-center justify-center text-6xl relative overflow-hidden" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                        <span class="relative z-10" style="color: #333446;">👤</span>
                    </div>
                </div>
            </div>
            
            <h1 class="text-5xl font-bold mb-4" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">User Profile</h1>
            <p class="text-xl font-light" style="color: #7F8CAA;">Account Information</p>
            <div class="w-24 h-1 mx-auto mt-4 rounded-full" style="background: linear-gradient(to right, #B8CFCE, #7F8CAA);"></div>
        </div>

        <!-- Main Profile Card -->
        <div class="gradient-border mb-8">
            <div class="inner-card">
                <div class="glass-card rounded-2xl p-8 space-y-8">
                    <!-- Name Field -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                                <svg class="w-5 h-5" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold" style="color: #EAEFEF;">Name</h3>
                        </div>
                        <div class="px-6 py-4 rounded-xl" style="background: rgba(127, 140, 170, 0.1); border: 1px solid rgba(184, 207, 206, 0.2);">
                            <div class="text-lg font-medium" style="color: #EAEFEF;">
                                {{ $user->username }}
                            </div>
                        </div>
                    </div>

                    <!-- Role Field -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                                <svg class="w-5 h-5" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold" style="color: #EAEFEF;">Role</h3>
                        </div>
                        <div class="px-6 py-4 rounded-xl" style="background: rgba(127, 140, 170, 0.1); border: 1px solid rgba(184, 207, 206, 0.2);">
                            <div class="text-lg font-medium capitalize" style="color: #EAEFEF;">
                                {{ $user->role }}
                            </div>
                        </div>
                    </div>

                    <!-- Status Indicators -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-6">
                        <div class="glass-card rounded-xl p-4 text-center">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                                <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="font-semibold" style="color: #B8CFCE;">Active</p>
                            <p class="text-sm" style="color: #7F8CAA;">Account Status</p>
                        </div>
                        
                        <div class="glass-card rounded-xl p-4 text-center">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                                <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <p class="font-semibold" style="color: #B8CFCE;">Secured</p>
                            <p class="text-sm" style="color: #7F8CAA;">Data Protection</p>
                        </div>
                        
                        <div class="glass-card rounded-xl p-4 text-center">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                                <svg class="w-6 h-6" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <p class="font-semibold" style="color: #B8CFCE;">Premium</p>
                            <p class="text-sm" style="color: #7F8CAA;">Access Level</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Section -->
        <div class="text-center">
            <form action="{{ route('auth.logout') }}" method="POST" class="inline-block">
                @csrf
                @method('delete')
                <button type="submit" class="px-8 py-4 rounded-xl font-bold text-lg flex items-center gap-3 mx-auto transition-all duration-300" style="background: linear-gradient(135deg, #ff6b6b, #ee5a52); color: #EAEFEF;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
            
            <p class="text-sm mt-4" style="color: #7F8CAA;">
                Session will be securely terminated
            </p>
        </div>
    </div>
</div>
@endsection
