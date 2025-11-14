@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <h6 class="text-xl font-extrabold text-white mb-6">Jadwal Mengajar Guru</h6>

        @include('partials.alert')

        <!-- Jadwal -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <h6 class="text-lg font-bold text-slate-700 bg-gray-100 px-4 py-3 border-b">Jadwal Mengajar</h6>

            <table class="min-w-full border-collapse border border-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="border border-gray-200 px-4 py-2 text-left">Tahun Pelajaran</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Tanggal</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Hari</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Waktu</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Mata Pelajaran</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Kelas</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwals as $jadwal)
                        @foreach ($jadwal->details as $jadwal_mapel)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-2">{{ $jadwal->tahunPelajaran->tahun ?? '-' }}
                                </td>
                                <td class="border border-gray-200 px-4 py-2">
                                    {{ $jadwal->tahunPelajaran->mulai . ' s/d ' . $jadwal->tahunPelajaran->selesai }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $jadwal_mapel->hari }}</td>
                                <td class="border border-gray-200 px-4 py-2">
                                    {{ optional($jadwal_mapel->jamMulai)->jam_mulai ? \Carbon\Carbon::parse($jadwal_mapel->jamMulai->jam_mulai)->format('H:i') : '-' }}
                                    -
                                    {{ optional($jadwal_mapel->jamSelesai)->jam_selesai ? \Carbon\Carbon::parse($jadwal_mapel->jamSelesai->jam_selesai)->format('H:i') : '-' }}
                                </td>
                                <td class="border border-gray-200 px-4 py-2">
                                    {{ $jadwal_mapel->mataPelajaran->nama_mapel ?? '-' }}
                                </td>
                                <td class="border border-gray-200 px-4 py-2">
                                    {{ $jadwal_mapel->kelas->nama_kelas . ' - ' . $jadwal_mapel->kelas->jurusan ?? '-' }}
                                </td>
                                <td class="border border-gray-200 px-4 py-2">
                                    {{ $jadwal_mapel->ruangan->nama_ruangan ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-4">Tidak ada jadwal tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
