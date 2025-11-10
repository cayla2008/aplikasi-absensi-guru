@extends('layouts.app')

@section('content')
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="w-full px-6 py-6 mx-auto">

            <h6 class="text-xl font-extrabold text-white mb-6">Tambah Jadwal</h6>

            {{-- GRID 2 CARD TERPISAH --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- CARD KIRI --}}
                <div class="bg-white shadow-xl rounded-2xl p-6">
                    <h6 class="text-sm font-semibold text-slate-600 mb-4 text-center">Data Guru</h6>

                    {{-- Nama Guru --}}
                    <div class="mb-4">
                        <label for="guru_id" class="block mb-2 text-sm font-bold text-slate-700">
                            Nama Guru
                        </label>
                        <select name="guru_id" id="guru_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">-- Pilih Nama Guru --</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tahun Pelajaran --}}
                    <div class="mb-4">
                        <label for="tahun_pelajaran_id" class="block mb-2 text-sm font-bold text-slate-700">
                            Tahun Pelajaran
                        </label>
                        <select name="tahun_pelajaran_id" id="tahun_pelajaran_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">-- Pilih Tahun Pelajaran --</option>
                            @foreach ($tahunPelajarans as $tahun)
                                <option value="{{ $tahun->id }}">{{ $tahun->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                

                {{-- CARD KANAN --}}
                <div class="bg-white shadow-xl rounded-2xl p-6" x-data="{ accordions: [false] }">

                    <!-- Header dengan tombol + -->
                    <div class="flex justify-between items-center mb-4">
                        <h6 class="text-white text-xl font-bold">Tambah Jadwal</h6>
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-600 text-white text-lg font-bold w-8 h-8 rounded-full flex items-center justify-center shadow-md transition-all duration-200"
                            @click="accordions.push(false)">
                            +
                        </button>
                    </div>

                    <template x-for="(open, index) in accordions" :key="index">
                        <div class="border border-gray-200 rounded-lg mb-3 overflow-hidden">

                            
                            <div
                                class="w-full bg-gray-100 px-4 py-2 flex justify-between items-center text-sm font-semibold text-slate-700 hover:bg-gray-200 transition">

                                <!-- Label kiri -->
                                <span @click="accordions[index] = !accordions[index]"
                                    class="cursor-pointer select-none">
                                    Jadwal
                                </span>

                                <!-- Tombol kanan sejajar -->
                                <div class="flex items-center space-x-2">
                                    <!-- Tombol + -->
                                    <span @click="accordions[index] = !accordions[index]"
                                        class="cursor-pointer text-slate-600 hover:text-slate-800 text-sm font-bold select-none">
                                        <span x-text="open ? '−' : '+'"></span>
                                    </span>

                                    <!-- Tombol hapus -->
                                    <button type="button"
                                        class="text-slate-400 hover:text-red-600 transition flex items-center justify-center"
                                        style="width: 18px; height: 18px;"
                                        @click.stop="accordions.splice(index, 1)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="#f80000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div x-show="open" x-collapse class="p-4 bg-white border-t border-gray-200">
                                <!-- Grid 2 kolom -->
                                <div class="mb-4">
                                    <label for="mata_pelajaran_id" class="block mb-2 text-sm font-bold text-slate-700">
                                        Mata Pelajaran
                                    </label>
                                    <select name="mata_pelajaran_id[]" id="mata_pelajaran_id"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                        <option value="">-- Pilih Mata Pelajaran --</option>
                                        @foreach ($mataPelajarans as $mapel)
                                            <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Kolom kiri atas -->
                                    <div class="mb-4">
                                        <label for="hari"
                                            class="block mb-2 text-sm font-bold text-slate-700">Hari</label>
                                        <select name="hari[]" id="hari"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                            <option value="">-- Pilih Hari --</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                        </select>
                                    </div>

                                    <!-- Kolom kanan atas -->
                                    <div class="mb-4">
                                        <label for="kelas_id"
                                            class="block mb-2 text-sm font-bold text-slate-700">Kelas</label>
                                        <select name="kelas_id[]" id="kelas_id"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                            <option value="">-- Pilih Kelas --</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}">
                                                    {{ $k->nama_kelas . ' - ' . $k->jurusan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Kolom kiri bawah -->
                                    <div class="mb-4">
                                        <label for="jam_mulai_id" class="block mb-2 text-sm font-bold text-slate-700">Jam
                                            Mulai</label>
                                        <select name="jam_mulai_id[]" id="jam_mulai_id"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                            <option value="">-- Pilih Jam Mulai --</option>
                                            @foreach ($jams as $jam)
                                                <option value="{{ $jam->id }}">
                                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $jam->jam_mulai)->format('H:i') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Kolom kanan bawah -->
                                    <div class="mb-4">
                                        <label for="jam_selesai_id"
                                            class="block mb-2 text-sm font-bold text-slate-700">Jam
                                            Selesai</label>
                                        <select name="jam_selesai_id[]" id="jam_selesai_id"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                            <option value="">-- Pilih Jam Selesai --</option>
                                            @foreach ($jams as $jam)
                                                <option value="{{ $jam->id }}">
                                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $jam->jam_selesai)->format('H:i') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        {{-- TOMBOL SIMPAN --}}
        <div class="flex justify-end gap-5 mt-8">
            <a href="{{ route('jadwal.index') }}"
                class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition-all text-center">
                Back
            </a>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-all">
                Simpan
            </button>
        </div>
    </form>
@endsection
