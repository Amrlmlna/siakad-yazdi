@extends('layouts.app')

@section('page-title', 'Tambah Dosen')
@section('page-description', 'Tambahkan data dosen baru ke sistem')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center space-x-3">
            <a href="{{ route('dosen.index') }}" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Tambah Dosen</h1>
                <p class="text-gray-600 mt-1">Lengkapi form untuk menambahkan dosen baru</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
        <form action="{{ route('dosen.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Username & Nama -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           placeholder="Masukkan username"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('username') }}"
                           required>
                    @error('username')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           placeholder="Masukkan nama lengkap"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('nama') }}"
                           required>
                    @error('nama')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- NIP & Bidang Keahlian -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700 mb-2">NIP</label>
                    <input type="text" 
                           id="nip" 
                           name="nip" 
                           placeholder="Masukkan NIP"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('nip') }}"
                           required>
                    @error('nip')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="bidang_keahlian" class="block text-sm font-medium text-gray-700 mb-2">Bidang Keahlian</label>
                    <input type="text" 
                           id="bidang_keahlian" 
                           name="bidang_keahlian" 
                           placeholder="Contoh: Sistem Informasi"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('bidang_keahlian') }}"
                           required>
                    @error('bidang_keahlian')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('dosen.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                    Batal
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-lg text-white hover:bg-blue-700 font-medium">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
