@extends('layouts.app')

@section('page-title', 'Tambah Jadwal')
@section('page-description', 'Buat jadwal perkuliahan baru')

@section('content')
<style>
    .form-card {
        background: rgba(51, 52, 70, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(127, 140, 170, 0.2);
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(184, 207, 206, 0.1), transparent);
        transition: left 0.6s;
    }
    
    .form-card:hover::before {
        left: 100%;
    }
    
    .form-input {
        background: rgba(51, 52, 70, 0.4);
        border: 1px solid rgba(127, 140, 170, 0.3);
        border-radius: 12px;
        padding: 1rem 1.25rem;
        color: #EAEFEF;
        font-size: 1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        width: 100%;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #B8CFCE;
        box-shadow: 0 0 0 3px rgba(184, 207, 206, 0.1);
        background: rgba(51, 52, 70, 0.6);
    }
    
    .form-input::placeholder {
        color: #7F8CAA;
    }
    
    .submit-button {
        background: linear-gradient(135deg, #B8CFCE, #7F8CAA);
        color: #333446;
        border: none;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(184, 207, 206, 0.3);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        width: 100%;
    }
    
    .submit-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .submit-button:hover::before {
        left: 100%;
    }
    
    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(184, 207, 206, 0.4);
    }
    
    .back-button {
        background: rgba(127, 140, 170, 0.2);
        color: #EAEFEF;
        border: 1px solid rgba(127, 140, 170, 0.3);
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .back-button:hover {
        background: rgba(127, 140, 170, 0.3);
        color: #EAEFEF;
        text-decoration: none;
        transform: translateY(-1px);
    }
</style>

<div class="max-w-2xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('jadwal.index') }}" class="back-button">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali ke Data Jadwal
        </a>
    </div>

    <!-- Form Card -->
    <div class="form-card p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background: linear-gradient(135deg, #B8CFCE, #7F8CAA);">
                <i data-lucide="calendar-plus" class="w-8 h-8" style="color: #333446;"></i>
            </div>
            <h2 class="text-3xl font-bold mb-2" style="color: #EAEFEF;">Tambah Jadwal</h2>
            <p style="color: #7F8CAA;">Buat jadwal perkuliahan baru</p>
        </div>

        <!-- Form -->
        <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Kelas -->
            <div class="space-y-2">
                <label class="block text-sm font-medium mb-2" style="color: #EAEFEF;">
                    <i data-lucide="users" class="w-4 h-4 inline mr-2" style="color: #B8CFCE;"></i>
                    Kelas
                </label>
                <select name="kelas_id" class="form-input" required>
                    <option value="" style="background: #333446; color: #EAEFEF;">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" style="background: #333446; color: #EAEFEF;">{{ $k->kode_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Hari -->
            <div class="space-y-2">
                <label class="block text-sm font-medium mb-2" style="color: #EAEFEF;">
                    <i data-lucide="calendar" class="w-4 h-4 inline mr-2" style="color: #B8CFCE;"></i>
                    Hari
                </label>
                <input type="text" name="hari" placeholder="Hari (contoh: Senin)" class="form-input" required>
            </div>

            <!-- Jam -->
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="block text-sm font-medium mb-2" style="color: #EAEFEF;">
                        <i data-lucide="clock" class="w-4 h-4 inline mr-2" style="color: #B8CFCE;"></i>
                        Jam Mulai
                    </label>
                    <input type="time" name="jam_mulai" class="form-input" required>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium mb-2" style="color: #EAEFEF;">
                        <i data-lucide="clock" class="w-4 h-4 inline mr-2" style="color: #B8CFCE;"></i>
                        Jam Selesai
                    </label>
                    <input type="time" name="jam_selesai" class="form-input" required>
                </div>
            </div>

            <!-- Ruangan -->
            <div class="space-y-2">
                <label class="block text-sm font-medium mb-2" style="color: #EAEFEF;">
                    <i data-lucide="map-pin" class="w-4 h-4 inline mr-2" style="color: #B8CFCE;"></i>
                    Ruangan
                </label>
                <input type="text" name="ruangan" placeholder="Ruangan (contoh: Lab Komputer 1)" class="form-input" required>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="submit-button">
                    <i data-lucide="save" class="w-5 h-5 mr-2"></i>
                    Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection
