<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Jam;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\TahunPelajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::with(['guru', 'tahunPelajaran'])->get();

        return view('jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $gurus = Guru::all();
        $tahunPelajarans = TahunPelajaran::all();
        $mataPelajarans = MataPelajaran::all();
        $kelas = Kelas::all();
        $jams = Jam::all();

        return view('jadwal.create', compact('gurus', 'tahunPelajarans', 'mataPelajarans', 'kelas', 'jams'));

    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'guru_id' => 'required|exists:gurus,id',
                'tahun_pelajaran_id' => 'required|exists:tahun_pelajaran,id',
                'kelas_id' => 'required|exists:kelas,id',
                'mata_pelajaran_id.*' => 'required|exists:mata_pelajaran,id',
            ]);

            $jadwal = Jadwal::create([
                'guru_id' => $request->guru_id,
                'tahun_pelajaran_id' => $request->tahun_pelajaran_id,
            ]);

            // Count how many detail sets we have
            $count = count($request->kelas_id);

            for ($i = 0; $i < $count; $i++) {
                $jadwal->details()->create([
                    'kelas_id' => $request->kelas_id[$i],
                    'mata_pelajaran_id' => $request->mata_pelajaran_id[$i],
                    'jam_mulai_id' => $request->jam_mulai_id[$i] ?? null,
                    'jam_selesai_id' => $request->jam_selesai_id[$i] ?? null,
                    'hari' => $request->hari[$i] ?? null,
                ]);
            }

            return redirect()->route('jadwal.index')->with('success', 'Jadwal created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jadwal = Jadwal::with(['guru', 'tahunPelajaran', 'mataPelajaran', 'kelas', 'jamMulai', 'jamSelesai'])
            ->findOrFail($id);

        return view('jadwal.detail', compact('jadwal'));
    }

    public function edit($id)
    {
        // Ambil jadwal utama
        $jadwal = Jadwal::with('details')->findOrFail($id);

        // Data untuk dropdown
        $gurus = Guru::all();
        $tahunPelajarans = TahunPelajaran::all();
        $mataPelajarans = MataPelajaran::all();
        $kelas = Kelas::all();
        $jams = Jam::all();

        return view('jadwal.edit', compact('jadwal', 'gurus', 'tahunPelajarans', 'mataPelajarans', 'kelas', 'jams'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'guru_id' => 'required|exists:gurus,id',
                'tahun_pelajaran_id' => 'required|exists:tahun_pelajaran,id',
            ]);

            // Ambil jadwal
            $jadwal = Jadwal::findOrFail($id);

            // Update jadwal utama
            $jadwal->update([
                'guru_id' => $request->guru_id,
                'tahun_pelajaran_id' => $request->tahun_pelajaran_id,
            ]);

            // Hapus detail lama
            $jadwal->details()->delete();


            // Tambahkan detail baru
            foreach ($request->details as $detail) {
                if (empty($detail['mata_pelajaran_id']) || empty($detail['kelas_id'])) {
                    continue;
                }

                $jadwal->details()->create([
                    'mata_pelajaran_id' => $detail['mata_pelajaran_id'],
                    'kelas_id' => $detail['kelas_id'],
                    'hari' => $detail['hari'] ?? null,
                    'jam_mulai_id' => $detail['jam_mulai_id'] ?? null,
                    'jam_selesai_id' => $detail['jam_selesai_id'] ?? null,
                ]);
            }

            return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari data guru berdasarkan ID
            $jadwal = Jadwal::findOrFail($id);

            // Hapus data guru
            $jadwal->delete();

            // Redirect kembali ke halaman index dengan pesan sukses
            return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil dihapus');
        } catch (\Exception $e) {
        }
    }
}
