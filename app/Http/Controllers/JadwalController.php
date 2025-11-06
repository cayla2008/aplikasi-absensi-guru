<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Guru;
use App\Models\TahunPelajaran;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::all();

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

    return view('jadwal.create', compact('gurus', 'tahunPelajarans', 'mataPelajarans'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'jenis_kelamin' => 'required',
            
        ]);

        Jadwal::create([
            'guru_id' => $request->guru_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            
        ]);

            return redirect()->route('jadwal.index')->with('success', 'Sukses menambahkan data jadwal');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $gurus = Guru::all();
        $tahunPelajarans = TahunPelajaran::all();
        $mataPelajarans = MataPelajaran::all();

    return view('jadwal.edit', compact('jadwal', 'gurus', 'tahunPelajarans', 'mataPelajarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'guru_id' => 'required|exists:gurus,id',
                'jenis_kelamin' => 'required|string|max:255',
                
            ]);

            $jadwal = Jadwal::findOrFail($id);
            $jadwal->update([
                'guru_id' => $request->guru_id,
                'jenis_kelamin' => $request->jenis_kelamin,
                
            ]);

            return redirect()->route('jadwal.index')->with('success', 'Berhasil mengedit data jadwal');
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
