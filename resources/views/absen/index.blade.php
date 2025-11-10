@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <h6 class="text-2xl font-extrabold text-white mb-6">Absen Guru</h6>

        {{-- GRID 2 KOLOM UNTUK DATANG & PULANG --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- KOTAK ABSEN DATANG --}}
            <div class="bg-white shadow-xl rounded-2xl p-6 flex flex-col items-center justify-center">
                <h6 class="text-xl font-bold text-slate-700 mb-4">Absen Datang</h6>

                {{-- Info Guru --}}
                <p class="text-slate-600 mb-2 text-sm">Nama: <span class="font-semibold">{{ Auth::user()->name }}</span></p>

                {{-- Jam Sekarang --}}
                <p class="text-slate-500 mb-4 text-sm">
                    Waktu Sekarang: <span id="clockIn" class="font-semibold"></span>
                </p>

                {{-- Tombol Absen Datang --}}
                <form action="{{ route('absen.datang') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg transition-all">
                        Absen Datang
                    </button>
                </form>

                {{-- Status --}}
                @if (session('datang'))
                    <p class="text-green-600 mt-4 font-semibold">{{ session('datang') }}</p>
                @endif
            </div>

            {{-- KOTAK ABSEN PULANG --}}
            <div class="bg-white shadow-xl rounded-2xl p-6 flex flex-col items-center justify-center">
                <h6 class="text-xl font-bold text-slate-700 mb-4">Absen Pulang</h6>

                {{-- Info Guru --}}
                <p class="text-slate-600 mb-2 text-sm">Nama: <span class="font-semibold">{{ Auth::user()->name }}</span></p>

                {{-- Jam Sekarang --}}
                <p class="text-slate-500 mb-4 text-sm">
                    Waktu Sekarang: <span id="clockOut" class="font-semibold"></span>
                </p>

                {{-- Tombol Absen Pulang --}}
                <form action="{{ route('absen.pulang') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition-all">
                        Absen Pulang
                    </button>
                </form>

                {{-- Status --}}
                @if (session('pulang'))
                    <p class="text-blue-600 mt-4 font-semibold">{{ session('pulang') }}</p>
                @endif
            </div>

        </div>
    </div>

    {{-- SCRIPT JAM REALTIME --}}
    <script>
        function updateClock() {
            const now = new Date();
            const time = now.toLocaleTimeString('id-ID', { hour12: false });
            document.getElementById('clockIn').textContent = time;
            document.getElementById('clockOut').textContent = time;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
@endsection
