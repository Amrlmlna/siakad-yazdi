<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        $roles = ['admin', 'dosen', 'mahasiswa'];
        return view('auth.register', compact('roles'));
    }

    public function login()
    {
        $roles = ['admin', 'dosen', 'mahasiswa'];
        return view('auth.login', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,dosen,mahasiswa'
        ]);

        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $request['password'],
            'role' => $request['role'],
        ]);

        return redirect()->route('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,dosen,mahasiswa'
        ]);

        // Check if user exists and role matches
        $user = User::where('username', $credentials['username'])
                    ->where('role', $credentials['role'])
                    ->first();

        if ($user && Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            } elseif ($user->role === 'dosen') {
                return redirect()->route('dosen.dashboard');
            } else {
                auth()->logout();
                return redirect()->route('auth.login')->with('error', 'Role tidak dikenal');
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials or role do not match our records.',
        ])->onlyInput('username', 'role');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
