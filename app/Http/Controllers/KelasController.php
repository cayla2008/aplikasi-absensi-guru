<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelases = Kelas::all();

        return view('kelas.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_kelas' => 'required',
                'jurusan' => 'required',
            ]);

            kelas::create([
                'nama_kelas' => $request->nama_kelas,
                'jurusan' => $request->jurusan,
            ]);

            return redirect()->route('kelas.index')->with('success', 'Sukses menambahkan data kelas');
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
        $kelas = Kelas::findOrFail($id);

        return view('kelas.edit', compact('kelas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama_kelas' => 'required|string|max:255',
                'jurusan' => 'required|string|max:100',
            ]);

            $kelas = Kelas::findOrFail($id);
            $kelas->update([
                'nama_kelas' => $request->nama_kelas,
                'jurusan' => $request->jurusan,
            ]);

            return redirect()->route('kelas.index')->with('success', 'Berhasil mengedit data guru');
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
            $kelas = Kelas::findOrFail($id);

            // Hapus data guru
            $kelas->delete();

            // Redirect kembali ke halaman index dengan pesan sukses
            return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
        } catch (\Exception $e) {
        }
    }
}
