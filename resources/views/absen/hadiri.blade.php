@extends('layouts.app')

@section('content')
    <div class="">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Absensi Guru</h1>
            <p class="text-gray-600">
                Mata Pelajaran: <span class="font-semibold">{{ $jadwal->mataPelajaran->nama ?? '-' }}</span> <br>
                Kelas: <span class="font-semibold">{{ $jadwal->kelas->nama ?? '-' }}</span> <br>
                Jam: <span class="font-semibold">{{ $jadwal->jamMulai->jam ?? '-' }} -
                    {{ $jadwal->jamSelesai->jam ?? '-' }}</span>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl mx-auto">
            <div class="bg-blue-100 rounded-2xl shadow-lg p-6 text-center">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Absen Datang</h2>
                <form action="{{ route('absen.form.datang', $jadwal->id) }}" method="POST">
                    @csrf
                    <a href="{{ route('absen.form.datang', $jadwal->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-all">
                        Hadir Sekarang
                    </a>


                </form>
            </div>

            <div class="bg-yellow-100 rounded-2xl shadow-lg p-6 text-center">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Absen Pulang</h2>
                <form action="{{ route('absen.form.pulang', $jadwal->id) }}" method="POST">
                    @csrf
                    <a href="{{ route('absen.form.pulang', $jadwal->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-lg transition-all">
                        Pulang Sekarang
                    </a>

                </form>
            </div>
        </div>
    </div>

    {{-- TOMBOL KEMBALI --}}
    <div class="text-center mt-10">
        <a href="{{ route('absen.index') }}"
            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg transition-all">
            Kembali
        </a>
    </div>
@endsection
