<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function admin()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }
    public function dosen()
    {
        $user = auth()->user();
        return view('dosen.profile', compact('user'));
    }
    public function mahasiswa()
    {
        $user = auth()->user();
        return view('mahasiswa.profile', compact('user'));
    }
}
