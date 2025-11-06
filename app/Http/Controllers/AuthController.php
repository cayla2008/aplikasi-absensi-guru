<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('Auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        try {
            // 1️⃣ Validasi input
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            // 2️⃣ Coba login
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                $role = Auth::user()->role ?? 'guru';


                // 3️⃣ Redirect berdasarkan role
                if ($role === 'admin') {
                    return redirect()->route('dashboard');// admin dashboard
                } elseif ($role === 'guru') {
                    return redirect()->route('guru.dashboard'); // guru dashboard
                } else {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Role tidak dikenali.');
                }
            }

            // Jika login gagal
            return redirect()->route('login')->with('error', 'Gagal login, periksa kembali email dan password');
        } catch (\Exception $e) {
            // Tangkap error tak terduga
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
