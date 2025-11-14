<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangs = ruang::all();

        return view('ruang.index', compact('ruangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all(); // ambil semua kelas

        return view('ruang.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = Kelas::find($request->kelas_id);

        Ruang::create([
            'kelas_id' => $kelas->id,
            'nama_ruang' => $kelas->nama_kelas.' - '.$kelas->jurusan,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dibuat dari data kelas');
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
        $ruang = Ruang::findOrFail($id);
        $kelas = Kelas::all();

        return view('ruang.edit', compact('ruang', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'kelas_id' => 'required|exists:kelas,id',
                'nama_ruang' => 'required|string|max:255',
                'lokasi' => 'required|string|max:255',

            ]);

            $ruang = Ruang::findOrFail($id);
            $ruang->update([
                'kelas_id' => $request->kelas_id,
                'nama_ruang' => $request->nama_ruang,
                'lokasi' => $request->lokasi,

            ]);

            return redirect()->route('ruang.index')->with('success', 'Berhasil mengedit data ruang');
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
            $ruang = Ruang::findOrFail($id);

            // Hapus data guru
            $ruang->delete();

            // Redirect kembali ke halaman index dengan pesan sukses
            return redirect()->route('ruang.index')->with('success', 'Data ruang berhasil dihapus');
        } catch (\Exception $e) {
        }
    }
}
