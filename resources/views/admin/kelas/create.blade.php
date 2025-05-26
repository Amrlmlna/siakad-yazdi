@extends('layouts.app')

@section('page-title', 'Tambah Kelas')
@section('page-description', 'Tambahkan data kelas baru ke sistem')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center space-x-3">
            <a href="{{ route('kelas.index') }}" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Tambah Kelas</h1>
                <p class="text-gray-600 mt-1">Lengkapi form untuk menambahkan kelas baru</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
        <form action="{{ route('kelas.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Kode Kelas & Ruangan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="kode_kelas" class="block text-sm font-medium text-gray-700 mb-2">Kode Kelas</label>
                    <input type="text" 
                           id="kode_kelas" 
                           name="kode_kelas" 
                           placeholder="Contoh: TI-1A"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('kode_kelas') }}"
                           required>
                    @error('kode_kelas')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="ruangan" class="block text-sm font-medium text-gray-700 mb-2">Ruangan</label>
                    <input type="text" 
                           id="ruangan" 
                           name="ruangan" 
                           placeholder="Contoh: TI 1"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('ruangan') }}"
                           required>
                    @error('ruangan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Mata Kuliah -->
            <div>
                <label for="mata_kuliah_id" class="block text-sm font-medium text-gray-700 mb-2">Mata Kuliah</label>
                <select name="mata_kuliah_id" 
                        id="mata_kuliah_id" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                    <option value="" disabled selected>Pilih Mata Kuliah</option>
                    @foreach($mata_kuliah as $mk)
                        <option value="{{ $mk->id }}" {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                            {{ $mk->nama }} ({{ $mk->kode }})
                        </option>
                    @endforeach
                </select>
                @error('mata_kuliah_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Info Section -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Informasi</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <p>Setelah memilih mata kuliah, dosen pengampu akan otomatis ditampilkan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('kelas.index') }}" 
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
