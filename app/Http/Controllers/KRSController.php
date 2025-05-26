<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $krs = KRS::with(['mahasiswa', 'jadwal'])->get();
        return view('admin.krs.index', compact('krs'));
    }
    public function krsMahasiswa()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Pastikan user adalah mahasiswa
        if ($user->role !== 'mahasiswa') {
            abort(403, 'Akses ditolak.');
        }

        // dd($user->id, Mahasiswa::where('user_id', $user->id)->first());
        // Ambil data mahasiswa dari user
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->firstOrFail();
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan. Silakan hubungi admin.');
        }

        // Ambil semua nilai KHS berdasarkan mahasiswa yang login
        $krs = KRS::with(['mahasiswa', 'jadwal.kelas'])
            ->where('mahasiswa_id', $mahasiswa->id)
            ->get();

        return view('mahasiswa.krs.index', compact('krs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        // dd(auth()->user()->id);
        $jadwal = Jadwal::with(['kelas'])->get();

        return view('mahasiswa.krs.create', compact(  'jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // dd('Store dipanggil');
        // dd($request->all());
        $validated = $request->validate([
            'jadwal_id' => 'required|exists:jadwal,id',
        ]);
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        
        if (!$mahasiswa) {
            return back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }
        $jadwal = Jadwal::find($validated['jadwal_id']);
        $existing = KRS::where('mahasiswa_id', $mahasiswa->id)
            ->where('jadwal_id', $jadwal->id)
            ->first();

        if ($existing) {
            return back()->with('error', 'Mata kuliah ini sudah ditambahkan ke KRS.');
        }
        $sudahAmbil = KRS::where('mahasiswa_id', $mahasiswa->id)
        ->whereHas('jadwal.kelas', function ($query) use ($jadwal) {
            $query->where('mata_kuliah_id', $jadwal->kelas->mata_kuliah_id ?? null);
        })
        ->exists();

        if ($sudahAmbil) {
            return back()->with('error', 'Kamu sudah mengambil mata kuliah ini di kelas lain.');
        }
        
        KRS::create([
            'mahasiswa_id' => $mahasiswa->id,
            'jadwal_id' => $jadwal->id,
            'tahun_ajaran' => "2023/2024",
            'semester' => $jadwal->kelas->mata_kuliah->semester,
        ]);

        return redirect()->route('krs.mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return KRS::with(['mahasiswa', 'kelas'])->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $krs = Krs::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('krs.edit', compact('krs', 'mahasiswa', 'matakuliahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $krs = KRS::findOrFail($id);
        $krs->update($request->all());
        return $krs;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $krs = Matakuliah::findOrFail($id);
        $krs->delete();
        return redirect()->route('krs.mahasiswa.index');
    }
}
