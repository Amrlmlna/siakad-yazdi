@extends('layouts.app')

@section('page-title', 'Edit Program Studi')
@section('page-description', 'Perbarui data program studi dalam sistem')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center space-x-3">
            <a href="{{ route('prodi.index') }}" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Edit Program Studi</h1>
                <p class="text-gray-600 mt-1">Perbarui informasi program studi: <span class="font-medium text-blue-600">{{ $prodi->nama }}</span></p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
        <form action="{{ route('prodi.update', $prodi->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Program Studi -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Program Studi</label>
                <input type="text" 
                       id="nama" 
                       name="nama" 
                       placeholder="Contoh: Teknik Informatika"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       value="{{ old('nama', $prodi->nama) }}"
                       required>
                @error('nama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fakultas -->
            <div>
                <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-2">Fakultas</label>
                <input type="text" 
                       id="fakultas" 
                       name="fakultas" 
                       placeholder="Contoh: Fakultas Teknik"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       value="{{ old('fakultas', $prodi->fakultas) }}"
                       required>
                @error('fakultas')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('prodi.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                    Batal
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-lg text-white hover:bg-blue-700 font-medium">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
