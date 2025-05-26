@extends('layouts.dosen')

@section('content')
<div class="min-h-screen p-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-playfair font-bold text-primary">
                    Tambah Absensi
                </h1>
                <p class="text-slate-400">Input kehadiran mahasiswa untuk kelas {{ $kelas->kode_kelas }} - {{ $kelas->mata_kuliah->nama }}</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl p-8 shadow-md border border-slate-200">
        <form action="{{ route("dosen.absensi.store") }}" method="POST">
            @csrf
            
            <!-- Class Info Header -->
            <div class="mb-8 p-6 bg-gray-50 rounded-xl border border-slate-200">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center shadow-md">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-playfair font-bold text-primary">{{ $kelas->kode_kelas }}</h2>
                        <p class="text-slate-700 font-medium">{{ $kelas->mata_kuliah->nama }}</p>
                        <p class="text-slate-400 text-sm">{{ count($krs) }} Mahasiswa Terdaftar</p>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-xl overflow-hidden border border-slate-200 mb-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Nama Mahasiswa</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">NIM</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($krs as $k)
                            <tr class="hover:bg-gray-50 transition-all duration-300">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">
                                            {{ substr($k->mahasiswa->nama ?? 'M', 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-slate-700 font-medium">{{ $k->mahasiswa->nama ?? '-' }}</p>
                                            <p class="text-slate-400 text-sm">Mahasiswa</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-slate-700 font-mono bg-slate-100 px-3 py-1 rounded-lg inline-block">
                                        {{ $k->mahasiswa->nim ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="hidden" name="krs_id[]" value="{{ $k->id }}">
                                    <input type="date" name="tanggal[]" value="{{ date('Y-m-d') }}" 
                                           class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md" required>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select name="status[]" 
                                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md min-w-[150px]" required>
                                        <option value="" class="bg-white">Pilih Status Kehadiran</option>
                                        <option value="hadir" class="bg-white">✅ Hadir</option>
                                        <option value="izin" class="bg-white">📝 Izin</option>
                                        <option value="sakit" class="bg-white">🏥 Sakit</option>
                                        <option value="alpha" class="bg-white">❌ Alpha</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" 
                        class="inline-flex items-center gap-3 bg-primary text-white font-bold px-8 py-4 rounded-md transition-all duration-300 hover:scale-105 shadow-md text-lg">
                    <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Absensi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
