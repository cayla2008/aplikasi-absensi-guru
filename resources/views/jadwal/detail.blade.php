@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-xl font-extrabold text-white">Detail Jadwal</h6>
            <a href="{{ route('jadwal.index') }}"
                class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition-all text-center">
                ← Kembali
            </a>
        </div>

        {{-- CARD INFO UTAMA --}}
        <div class="bg-white shadow-xl rounded-2xl p-6 mb-8">
            <h6 class="text-lg font-bold text-slate-700 mb-4">Informasi Jadwal</h6>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-500 font-semibold">Nama Guru</p>
                    <p class="text-gray-800">{{ $jadwal->guru->nama_guru ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-500 font-semibold">Tahun Pelajaran</p>
                    <p class="text-gray-800">{{ $jadwal->tahunPelajaran->tahun ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-gray-500 font-semibold">Total Kelas</p>
                    <p class="text-gray-800">{{ $jadwal->details->count() }} kelas</p>
                </div>
            </div>
        </div>

        {{-- CARD DETAIL JADWAL --}}
        <div class="bg-white shadow-xl rounded-2xl p-6">
            <h6 class="text-lg font-bold text-slate-700 mb-4">Rincian Jadwal</h6>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 rounded-lg text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-4 py-2 text-left">No</th>
                            <th class="border px-4 py-2 text-left">Hari</th>
                            <th class="border px-4 py-2 text-left">Jam</th>
                            <th class="border px-4 py-2 text-left">Kelas</th>
                            <th class="border px-4 py-2 text-left">MataPelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwal->details as $index => $detail)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $detail->hari ?? '-' }}</td>
                                <td class="border px-4 py-2">
                                    {{ optional($detail->jamMulai)->jam_mulai ? \Carbon\Carbon::createFromFormat('H:i:s', $detail->jamMulai->jam_mulai)->format('H:i') : '-' }}
                                    -
                                    {{ optional($detail->jamSelesai)->jam_selesai ? \Carbon\Carbon::createFromFormat('H:i:s', $detail->jamSelesai->jam_selesai)->format('H:i') : '-' }}
                                </td>
                                <td class="border px-4 py-2">{{ $detail->kelas->nama_kelas ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $detail->mataPelajaran->nama_mapel ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border px-4 py-3 text-center text-gray-500">
                                    Tidak ada data jadwal untuk guru ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
