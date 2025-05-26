<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\KHS;
use App\Models\KRS;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KHSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $krs = Jadwal::whereIn('id', function ($query) {
        $query->select('jadwal_id')
                ->from('krs')
                ->groupBy('jadwal_id');
    })->with('kelas.mata_kuliah')->get();
        return view('dosen.khs.index', compact('krs'));
    }

    public function nilaiMahasiswa()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Pastikan user adalah mahasiswa
        if ($user->role !== 'mahasiswa') {
            abort(403, 'Akses ditolak.');
        }

        // Ambil data mahasiswa dari user
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->firstOrFail();

        // Ambil semua nilai KHS berdasarkan mahasiswa yang login
        $khs = KHS::with(['krs.jadwal', 'krs.jadwal.kelas'])
            ->whereHas('krs', function ($query) use ($mahasiswa) {
                $query->where('mahasiswa_id', $mahasiswa->id);
            })
            ->get();

        return view('mahasiswa.khs.index', compact('khs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        $kelas = Kelas::findOrFail($request->kelas_id);

        $krs = KRS::with(['mahasiswa', 'jadwal.kelas', 'khs'])
            ->whereHas('jadwal.kelas', function ($query) use ($kelas) {
                $query->where('id', $kelas->id);
            })
            ->get();
        // $krs = KRS::with('mahasiswa')->get();
        return view('dosen.khs.create', compact('krs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $krsIds = $request->input('krs_id');
        $nilaiList = $request->input('nilai');

        foreach ($krsIds as $index => $krsId) {
            $nilai = $nilaiList[$index];

            if (!$nilai) {
                continue;
            }

            // Update jika sudah ada, atau buat baru jika belum
            KHS::updateOrCreate(
                ['krs_id' => $krsId],
                ['nilai' => $nilai]
            );
        }

        return redirect()->route('dosen.khs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return KHS::with('krs')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        return KHS::destroy($id);
    }
}
