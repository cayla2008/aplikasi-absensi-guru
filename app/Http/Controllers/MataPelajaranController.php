<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_pelajarans = MataPelajaran::all();

        return view('mata_pelajaran.index', compact('mata_pelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mata_pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'nama_mapel' => 'required',
            'keterangan' => 'required',
            
        ]);

        MataPelajaran::create([
            'nama_mapel' => $request->nama_mapel,
            'keterangan' => $request->keterangan,
            
        ]);

            return redirect()->route('mata_pelajaran.index')->with('success', 'Sukses menambahkan data mata pelajaran');
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
        $mata_pelajaran = MataPelajaran::findOrFail($id);

        return view('mata_pelajaran.edit', compact('mata_pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama_mapel' => 'required|string|max:255',
                'keterangan' => 'required|string|max:255',
            ]);

            $mata_pelajaran = MataPelajaran::findOrFail($id);
            $mata_pelajaran->update([
                'nama_mapel' => $request->nama_mapel,
                'keterangan' => $request->keterangan,
        
            ]);

            return redirect()->route('mata_pelajaran.index')->with('success', 'Berhasil mengedit data mata pelajaran');
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
            $mata_pelajaran = MataPelajaran::findOrFail($id);

            // Hapus data guru
            $mata_pelajaran->delete();

            // Redirect kembali ke halaman index dengan pesan sukses
            return redirect()->route('mata_pelajaran.index')->with('success', 'Data mata pelajaran berhasil dihapus');
        } catch (\Exception $e) {
        }
    }
}
