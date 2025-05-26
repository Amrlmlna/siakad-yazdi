@extends('layouts.app')

@section('page-title', 'Data Jadwal')
@section('page-description', 'Kelola jadwal perkuliahan semester aktif')

@section('content')
<style>
    .data-card {
        background: rgba(51, 52, 70, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(127, 140, 170, 0.2);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .table-row {
        border-bottom: 1px solid rgba(127, 140, 170, 0.1);
        transition: all 0.2s ease;
    }
    
    .table-row:hover {
        background: rgba(184, 207, 206, 0.05);
    }
    
    .add-button {
        background: linear-gradient(135deg, #B8CFCE, #7F8CAA);
        color: #333446;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .add-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(184, 207, 206, 0.4);
        color: #333446;
        text-decoration: none;
    }
    
    .edit-button {
        background: rgba(184, 207, 206, 0.2);
        color: #B8CFCE;
        border: 1px solid rgba(184, 207, 206, 0.3);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .edit-button:hover {
        background: rgba(184, 207, 206, 0.3);
        color: #B8CFCE;
        text-decoration: none;
    }
    
    .delete-button {
        background: rgba(255, 107, 107, 0.2);
        color: #ff6b6b;
        border: 1px solid rgba(255, 107, 107, 0.3);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .delete-button:hover {
        background: rgba(255, 107, 107, 0.3);
    }
</style>

<div class="space-y-6">
    <!-- Header -->
    <div class="data-card p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold mb-2" style="color: #EAEFEF;">Data Jadwal</h2>
                <p style="color: #7F8CAA;">Kelola jadwal perkuliahan semester aktif</p>
            </div>
            <a href="{{ route('jadwal.create') }}" class="add-button">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Tambah Jadwal
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="data-card p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-opacity-20" style="border-color: #7F8CAA;">
                        <th class="text-left py-4 px-4 font-semibold" style="color: #7F8CAA;">No</th>
                        <th class="text-left py-4 px-4 font-semibold" style="color: #7F8CAA;">Kelas</th>
                        <th class="text-left py-4 px-4 font-semibold" style="color: #7F8CAA;">Hari</th>
                        <th class="text-left py-4 px-4 font-semibold" style="color: #7F8CAA;">Jam</th>
                        <th class="text-left py-4 px-4 font-semibold" style="color: #7F8CAA;">Ruangan</th>
                        <th class="text-center py-4 px-4 font-semibold" style="color: #7F8CAA;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $j)
                    <tr class="table-row">
                        <td class="py-4 px-4 font-medium" style="color: #EAEFEF;">{{ $loop->iteration }}</td>
                        <td class="py-4 px-4" style="color: #EAEFEF;">{{ $j->kelas->kode_kelas ?? '-' }}</td>
                        <td class="py-4 px-4" style="color: #EAEFEF;">{{ $j->hari }}</td>
                        <td class="py-4 px-4" style="color: #EAEFEF;">{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                        <td class="py-4 px-4" style="color: #EAEFEF;">{{ $j->ruangan }}</td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('jadwal.edit', $j->id) }}" class="edit-button">
                                    <i data-lucide="edit" class="w-3 h-3"></i>
                                    Edit
                                </a>
                                
                                <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="delete-button">
                                        <i data-lucide="trash-2" class="w-3 h-3 mr-1"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection
