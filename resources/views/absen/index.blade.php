@extends('layouts.app')

@section('content')
    <div class="">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
            Absensi Guru - Jadwal Hari Ini ({{ $hariIni }})
        </h2>

        {{-- Cek apakah ada jadwal hari ini --}}
        @if ($jadwals->isEmpty())
            <p class="text-center text-gray-500">Tidak ada jadwal mengajar hari ini.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($jadwals as $jadwal)
                    <div
                        class="flex justify-between items-center border-2 border-blue-300 bg-blue-100 rounded-2xl shadow-md p-5 hover:shadow-xl transition duration-200">
                        <div>
                            <p class="font-bold text-lg text-black">{{ $jadwal->mataPelajaran->nama_mapel ?? '-' }}</p>
                            <p class="text-sm text-black">
                                Jam {{ $jadwal->jamMulai->jam_mulai ?? '-' }} -
                                {{ $jadwal->jamSelesai->jam_selesai ?? '-' }}
                            </p>
                            <p class="text-sm text-black">
                                {{ $jadwal->kelas->nama_kelas ?? '-' }} - {{ $jadwal->ruang->nama_ruang ?? '-' }}
                            </p>
                        </div>
                        <a href="{{ route('absen.hadiri', $jadwal->id) }}"
                            class="bg-yellow-400 text-black font-semibold px-4 py-2 rounded-lg hover:bg-yellow-500 transition">
                            Hadiri
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
