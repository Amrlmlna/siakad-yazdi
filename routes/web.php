<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/',[AuthController::class, 'register'])->name('register');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});
    
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen/dashboard',[DashboardController::class, 'index'])->name('dosen.dashboard');
    
    // KHS Routes for Dosen
    Route::get('/dosen/khs/create', [KHSController::class, 'create'])->name('dosen.khs.create');
    Route::post('/dosen/khs/store', [KHSController::class, 'store'])->name('dosen.khs.store');
    Route::get('/dosen/khs', [KHSController::class, 'index'])->name('dosen.khs.index');
    
    // Absensi Routes for Dosen
    Route::get('/dosen/absensi', [AbsensiController::class, 'index'])->name('dosen.absensi.index');
    Route::get('/dosen/absensi/create', [AbsensiController::class, 'create'])->name('dosen.absensi.create');
    Route::post('/dosen/absensi', [AbsensiController::class, 'store'])->name('dosen.absensi.store');
    Route::get('/dosen/absensi/{kelas_id}/edit', [AbsensiController::class, 'edit'])->name('dosen.absensi.edit');
    Route::put('/dosen/absensi', [AbsensiController::class, 'update'])->name('dosen.absensi.update');
    
    Route::get('/profile/dosen', [ProfileController::class, 'dosen'])->name('profile.dosen.index');
});
    
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard',[DashboardController::class, 'index'])->name('mahasiswa.dashboard');
    
    // KRS Routes for Mahasiswa
    Route::get('/mahasiswa/krs', [KRSController::class, 'krsMahasiswa'])->name('krs.mahasiswa.index');
    Route::get('/mahasiswa/krs/create', [KRSController::class, 'create'])->name('krs.create');
    Route::post('/mahasiswa/krs', [KRSController::class, 'store'])->name('krs.store');
    Route::delete('/mahasiswa/krs/{id}', [KRSController::class, 'destroy'])->name('krs.destroy');

    // KHS Routes for Mahasiswa
    Route::get('/mahasiswa/khs', [KHSController::class, 'nilaiMahasiswa'])->name('khs.nilaiMahasiswa');

    Route::get('/profile/mahasiswa', [ProfileController::class, 'mahasiswa'])->name('profile.mahasiswa.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');

    // Mahasiswa Management
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    // Dosen Management
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{id}', [DosenController::class, 'show'])->name('dosen.show');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

    // Mata Kuliah Management
    Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');
    Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
    Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
    Route::get('/matakuliah/{id}', [MataKuliahController::class, 'show'])->name('matakuliah.show');
    Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
    Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');

    // Jadwal Management
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}', [JadwalController::class, 'show'])->name('jadwal.show');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

    // Kelas Management
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('kelas.show');
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    // Prodi Management
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
    Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
    Route::get('/prodi/{id}', [ProdiController::class, 'show'])->name('prodi.show');
    Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
    Route::put('/prodi/{id}', [ProdiController::class, 'update'])->name('prodi.update');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

    // User Management
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // KRS Management (Admin view)
    Route::get('/admin/krs', [KRSController::class, 'index'])->name('krs.index');
    Route::delete('/admin/krs/{id}', [KRSController::class, 'destroy'])->name('krs.admin.destroy');

    // Profile
    Route::get('/profile/admin', [ProfileController::class, 'admin'])->name('profile.admin.index');
});
