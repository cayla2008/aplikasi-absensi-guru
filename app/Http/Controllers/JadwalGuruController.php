<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\Jadwal;

class JadwalGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil user yang login
        $user = Auth::user();

        // Cari data guru yang terhubung dengan user ini
        $guru = Guru::where('user_id', $user->id)->first();

        if (! $guru) {
            return redirect()->back()->with('error', 'Data guru tidak ditemukan untuk akun ini.');
        }

        // Ambil semua jadwal berdasarkan guru_id
        // dan eager load relasi yang dibutuhkan
        $jadwals = Jadwal::with([
            'tahunPelajaran',
            'mataPelajaran',
            'kelas',
            'ruang',
            'jamMulai',
            'jamSelesai',
        ])
        ->where('guru_id', $guru->id)
        ->get();

        // Kirim ke view
        return view('jadwal_guru.index', compact('guru', 'jadwals'));
    }

    // fungsi lainnya (create, store, dst) kosong dulu
}
