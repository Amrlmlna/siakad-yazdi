@extends('layouts.app')

@section('page-title', 'Tambah Mahasiswa')
@section('page-description', 'Tambahkan data mahasiswa baru ke sistem')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center space-x-3">
            <a href="{{ route('mahasiswa.index') }}" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Tambah Mahasiswa</h1>
                <p class="text-gray-600 mt-1">Lengkapi form untuk menambahkan mahasiswa baru</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
        <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-6">
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

            <!-- NIM & Angkatan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                    <input type="text" 
                           id="nim" 
                           name="nim" 
                           placeholder="Masukkan NIM"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('nim') }}"
                           required>
                    @error('nim')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-2">Angkatan</label>
                    <input type="text" 
                           id="angkatan" 
                           name="angkatan" 
                           placeholder="Contoh: 2024"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('angkatan') }}"
                           required>
                    @error('angkatan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Program Studi -->
            <div>
                <label for="prodi_id" class="block text-sm font-medium text-gray-700 mb-2">Program Studi</label>
                <select name="prodi_id" 
                        id="prodi_id" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                    <option value="" disabled selected>Pilih Program Studi</option>
                    @foreach ($prodi as $prodis)
                        <option value="{{ $prodis->id }}" {{ old('prodi_id') == $prodis->id ? 'selected' : '' }}>
                            {{ $prodis->nama }}
                        </option>
                    @endforeach
                </select>
                @error('prodi_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('mahasiswa.index') }}" 
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
