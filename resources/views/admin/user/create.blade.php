@extends('layouts.app')

@section('page-title', 'Tambah User')
@section('page-description', 'Tambahkan pengguna baru ke sistem')

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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold mb-2" style="color: #EAEFEF;">Tambah User</h2>
                <p style="color: #7F8CAA;">Buat akun pengguna baru dalam sistem</p>
            </div>

            <!-- Form -->
            <form action="{{ route('user.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Username Field -->
                <div>
                    <label class="block text-sm font-medium mb-2" style="color: #B8CFCE;">Username</label>
                    <input type="text" name="username" placeholder="Masukkan username" class="form-input w-full px-4 py-3 rounded-xl" required>
                    @error('username')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-sm font-medium mb-2" style="color: #B8CFCE;">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" class="form-input w-full px-4 py-3 rounded-xl" required>
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role Field -->
                <div>
                    <label class="block text-sm font-medium mb-2" style="color: #B8CFCE;">Role Pengguna</label>
                    <select name="role" class="form-input w-full px-4 py-3 rounded-xl" required>
                        <option value="" style="background: #333446; color: #7F8CAA;">-- Pilih Role --</option>
                        <option value="admin" style="background: #333446; color: #EAEFEF;">Admin</option>
                        <option value="dosen" style="background: #333446; color: #EAEFEF;">Dosen</option>
                        <option value="mahasiswa" style="background: #333446; color: #EAEFEF;">Mahasiswa</option>
                    </select>
                    @error('role')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full py-3 px-6 rounded-xl font-bold transition-all duration-300" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA); color: #333446;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                        Simpan User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
