<?php

namespace App\Http\Controllers;

use App\Models\TahunPelajaran;
use Illuminate\Http\Request;

class TahunPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun_pelajarans = TahunPelajaran::all();

        return view('tahun_pelajaran.index', compact('tahun_pelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun_pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'status' => 'required',
            
        ]);

        TahunPelajaran::create([
            'tahun' => $request->tahun,
            'semester' => $request->semester,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'status' => $request->status,
            
        ]);

            return redirect()->route('tahun_pelajaran.index')->with('success', 'Sukses menambahkan data tahun pelajaran');
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
        $tahun_pelajaran = TahunPelajaran::findOrFail($id);

        return view('tahun_pelajaran.edit', compact('tahun_pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'tahun' => 'required|string|max:255',
                'semester' => 'required|string|max:255',
                'mulai' => 'required|string|max:255',
                'selesai' => 'required|string|max:255',
                'status' => 'required|string|max:255',
            ]);

            $tahun_pelajaran = TahunPelajaran::findOrFail($id);
            $tahun_pelajaran->update([
                'tahun' => $request->tahun,
                'semester' => $request->semester,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'status' => $request->status,
        
            ]);

            return redirect()->route('tahun_pelajaran.index')->with('success', 'Berhasil mengedit data tahun pelajaran');
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
            $tahun_pelajaran = TahunPelajaran::findOrFail($id);

            // Hapus data guru
            $tahun_pelajaran->delete();

            // Redirect kembali ke halaman index dengan pesan sukses
            return redirect()->route('tahun_pelajaran.index')->with('success', 'Data tahun pelajaran berhasil dihapus');
        } catch (\Exception $e) {
        }
    }
}
