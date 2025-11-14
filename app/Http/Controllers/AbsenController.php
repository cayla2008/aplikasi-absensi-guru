<?php

namespace App\Http\Controllers;

use App\Models\TrJadwalMapel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Tampilkan halaman absen guru (jadwal hari ini).
     */
    public function index()
    {
        // Ambil data guru yang sedang login
        $guru = auth()->user()->guru;

        // Kalau belum terhubung dengan data guru
        if (! $guru) {
            return redirect()->back()->with('error', 'Data guru tidak ditemukan untuk akun ini.');
        }

        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];

        $hariInggris = Carbon::now()->format('l');
        $hariIni = $days[$hariInggris];

        // Ambil semua jadwal guru yang cocok dengan hari ini
        $jadwals = TrJadwalMapel::with(['mataPelajaran', 'kelas', 'ruang', 'jamMulai', 'jamSelesai'])
            ->whereHas('jadwal', function ($query) use ($guru) {
                $query->where('guru_id', $guru->id);
            })
            ->where('hari', $hariIni)
            ->get();

        // Kirim data ke view
        return view('absen.index', compact('guru', 'jadwals', 'hariIni'));
    }

    public function hadiri($jadwalId)
    {
        $jadwal = TrJadwalMapel::with(['mataPelajaran', 'kelas', 'jamMulai', 'jamSelesai'])
            ->findOrFail($jadwalId);

        return view('absen.hadiri', compact('jadwal'));
    }

    public function showAbsenDatang($id)
    {
        $jadwal = TrJadwalMapel::with(['mataPelajaran', 'kelas', 'jamMulai', 'jamSelesai'])
            ->findOrFail($id);

        return view('absen.datang', compact('jadwal'));
    }

    public function showAbsenPulang($id)
    {
        $jadwal = TrJadwalMapel::with(['mataPelajaran', 'kelas', 'jamMulai', 'jamSelesai'])
            ->findOrFail($id);

        return view('absen.pulang', compact('jadwal'));
    }

    public function create()
    {
        //
    }

    /**
     * Simpan data absen (absen datang / pulang).
     */
    public function store(Request $request)
    {
        // nanti di sini buat logika simpan absen (tahap berikutnya)
    }

    /**
     * Detail absen tertentu (opsional).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Form edit (opsional).
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update data absen (opsional).
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Hapus data absen (opsional).
     */
    public function destroy(string $id)
    {
        //
    }
}
