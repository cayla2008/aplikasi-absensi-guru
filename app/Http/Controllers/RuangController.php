<?php

namespace App\Http\Controllers;

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
        return view('ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'nama_ruang' => 'required',
            'lokasi' => 'required',
            
        ]);

        Ruang::create([
            'nama_ruang' => $request->nama_ruang,
            'lokasi' => $request->lokasi,
            
        ]);

            return redirect()->route('ruang.index')->with('success', 'Sukses menambahkan data ruang');
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
        $ruang = Ruang::findOrFail($id);

        return view('ruang.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama_ruang' => 'required|string|max:255',
                'lokasi' => 'required|string|max:255',
                
            ]);

            $ruang = Ruang::findOrFail($id);
            $ruang->update([
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
