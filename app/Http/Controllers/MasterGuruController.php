<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class MasterGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::with(['user'])->paginate(10);

        return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'nama_guru' => 'required',
                'nip' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required',
                'no_tlp' => 'required',
                'alamat' => 'required',
                'password'=> 'required|min:8'
            ]);

            $user = User::create([
                'name' => $request->nama_guru,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            Guru::create([
                'nama_guru' => $request->nama_guru,
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'user_id' => $user->id,
            ]);

            return redirect()->route('guru.index')->with('success', 'Sukses menambahkan data guru');
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
        $guru = Guru::findOrFail($id);

        $usedUserIds = Guru::where('id', '!=', $id)->pluck('user_id');
        $currentUserId = Guru::where('id', $id)->value('user_id');

        $users = User::whereNotIn('id', $usedUserIds)
            ->where('id', '!=', 1)
            ->orWhere('id', $currentUserId)
            ->get(['id', 'email']);

        return view('guru.edit', compact('guru', 'users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama_guru' => 'required|string|max:255',
                'nip' => 'required|string|max:255',
                'jenis_kelamin' => 'required|string|max:255',
                'email' => 'required|email|unique:gurus,email,'.$id,
                'no_tlp' => 'required|string|max:100',
                'alamat' => 'required|string|max:255',
            ]);

            $guru = Guru::findOrFail($id);



            $guru->update([
                'nama_guru' => $request->nama_guru,
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
            ]);

            return redirect()->route('guru.index')->with('success', 'Berhasil mengedit data guru');
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
            $guru = Guru::findOrFail($id);

            // Hapus data guru
            $guru->delete();

            // Redirect kembali ke halaman index dengan pesan sukses
            return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus');
        } catch (\Exception $e) {
        }
    }
}
