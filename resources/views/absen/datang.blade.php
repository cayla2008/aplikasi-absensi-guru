@extends('layouts.app')

@section('content')
<div class="">

    {{-- Header biru seperti desain --}}
    <div class="bg-blue-500 py-10 text-center text-white rounded-b-3xl shadow">
        <h1 class="text-3xl font-bold mb-2">Absen Datang Guru</h1>
        <p>Mata Pelajaran: <b>{{ $jadwal->mataPelajaran->nama_mapel ?? '-' }}</b></p>
        <p>Kelas: <b>{{ $jadwal->kelas->nama_kelas ?? '-' }}</b></p>
        <p>Jam: <b>{{ $jadwal->jamMulai->jam_mulai ?? '-' }} - {{ $jadwal->jamSelesai->jam_selesai ?? '-' }}</b></p>
    </div>

    <div class="max-w-xl mx-auto mt-10 p-6">

        <form action="{{ route('absen.form.datang', $jadwal->id) }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="space-y-6">
            @csrf

            {{-- AMBIL FOTO --}}
            <div class="bg-blue-50 p-6 rounded-2xl shadow">
                <label class="block font-semibold text-gray-700 mb-2">Ambil Foto:</label>
                <input type="file" name="foto" accept="image/*" capture="camera"
                    class="w-full bg-white p-3 rounded-lg border">
            </div>

            {{-- STATUS HADIR / IZIN / SAKIT --}}
            <div class="bg-gray-50 p-6 rounded-2xl shadow">
                <label class="block font-semibold text-gray-700 mb-2">
                    Status Kehadiran
                </label>

                <select name="status" onchange="toggleKeterangan(this.value)"
                        class="w-full p-3 rounded-lg border bg-white">
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                </select>

                {{-- KETERANGAN MUNCUL JIKA IZIN/SAKIT --}}
                <div id="keteranganBox" class="hidden mt-4">
                    <label class="block mb-2 font-semibold text-gray-700">Keterangan</label>
                    <textarea name="keterangan"
                              class="w-full p-3 rounded-lg border bg-white"></textarea>
                </div>
            </div>

            {{-- TOMBOL SUBMIT --}}
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold shadow">
                Submit Absen Datang
            </button>

            {{-- TOMBOL KEMBALI --}}
            <a href="{{ route('absen.index') }}"
                class="block w-full text-center bg-gray-300 hover:bg-gray-400 text-black py-3 rounded-xl shadow">
                Kembali
            </a>

        </form>
    </div>
</div>

<script>
function toggleKeterangan(value) {
    document.getElementById('keteranganBox').classList.toggle('hidden', value === 'Hadir');
}
</script>

@endsection
