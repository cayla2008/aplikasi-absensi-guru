<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\Request;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jams = Jam::all();

        return view('jam.index', compact('jams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            
        ]);

        Jam::create([
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            
        ]);

            return redirect()->route('jam.index')->with('success', 'Sukses menambahkan data jam');
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
        $jam = Jam::findOrFail($id);

        return view('jam.edit', compact('jam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'jam_mulai' => 'required|string|max:255',
                'jam_selesai' => 'required|string|max:255',
                
            ]);

            $jam = Jam::findOrFail($id);
            $jam->update([
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                
            ]);

            return redirect()->route('jam.index')->with('success', 'Berhasil mengedit data jam');
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
            $jam = Jam::findOrFail($id);

            // Hapus data guru
            $jam->delete();

            // Redirect kembali ke halaman index dengan pesan sukses
            return redirect()->route('jam.index')->with('success', 'Data jam berhasil dihapus');
        } catch (\Exception $e) {
        }
    }
}
