@extends('layouts.app')

@section('page-title', 'Edit User')
@section('page-description', 'Perbarui informasi pengguna')

@section('content')
<style>
    .glass-card {
        backdrop-filter: blur(20px);
        background: rgba(51, 52, 70, 0.6);
        border: 1px solid rgba(127, 140, 170, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .form-input {
        background: rgba(127, 140, 170, 0.1);
        border: 1px solid rgba(184, 207, 206, 0.2);
        transition: all 0.3s ease;
        color: #EAEFEF;
    }
    
    .form-input:focus {
        border-color: #B8CFCE;
        background: rgba(127, 140, 170, 0.2);
        outline: none;
        box-shadow: 0 0 0 3px rgba(184, 207, 206, 0.1);
    }
    
    .form-input::placeholder {
        color: #7F8CAA;
    }
    
    .user-info-card {
        background: rgba(184, 207, 206, 0.1);
        border: 1px solid rgba(184, 207, 206, 0.2);
    }
</style>

<div class="min-h-screen p-4 md:p-6 lg:p-8 flex items-center justify-center">
    <div class="w-full max-w-2xl">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('user.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg transition-colors" style="background: rgba(127, 140, 170, 0.2); color: #B8CFCE;" onmouseover="this.style.background='rgba(127, 140, 170, 0.3)'" onmouseout="this.style.background='rgba(127, 140, 170, 0.2)'">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Data User
            </a>
        </div>

        <!-- Form Card -->
        <div class="glass-card rounded-2xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                    <svg class="w-8 h-8" style="color: #333446;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold mb-2" style="color: #EAEFEF;">Edit User</h2>
                <p style="color: #7F8CAA;">Perbarui informasi pengguna</p>
            </div>

            <!-- Current User Info -->
            <div class="user-info-card rounded-xl p-4 mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center font-semibold" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;">
                        {{ strtoupper(substr($user->username, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-semibold" style="color: #EAEFEF;">{{ $user->username }}</p>
                        <p class="text-sm capitalize" style="color: #B8CFCE;">{{ $user->role }}</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Username Field -->
                <div>
                    <label class="block text-sm font-medium mb-2" style="color: #B8CFCE;">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-input w-full px-4 py-3 rounded-xl" required>
                    @error('username')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role Field -->
                <div>
                    <label class="block text-sm font-medium mb-2" style="color: #B8CFCE;">Role Pengguna</label>
                    <select name="role" class="form-input w-full px-4 py-3 rounded-xl" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }} style="background: #333446; color: #EAEFEF;">Admin</option>
                        <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }} style="background: #333446; color: #EAEFEF;">Dosen</option>
                        <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }} style="background: #333446; color: #EAEFEF;">Mahasiswa</option>
                    </select>
                    @error('role')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full py-3 px-6 rounded-xl font-bold transition-all duration-300" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
