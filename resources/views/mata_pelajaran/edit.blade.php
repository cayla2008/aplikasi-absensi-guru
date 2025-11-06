@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Edit Data Mata Pelajaran</h6>
            </div>

            @include('partials.alert')


            <div class="flex-auto p-6">
                <form action="{{ route('mata_pelajaran.update', $mata_pelajaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama Mapel --}}
                    <div class="mb-4">
                        <label for="nama_mapel" class="block mb-2 text-sm font-bold text-slate-700">Nama Mapel</label>
                        <select name="nama_mapel" id="nama_mapel"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            <option value="Matematika"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Matematika' ? 'selected' : '' }}>
                                Matematika</option>
                            <option value="Bahasa Indonesia"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Bahasa Indonesia' ? 'selected' : '' }}>
                                Bahasa Indonesia</option>
                            <option value="Bahasa Inggris"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Bahasa Inggris' ? 'selected' : '' }}>
                                Bahasa Inggris</option>
                            <option value="Pendidikan Agama"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Pendidikan Agama' ? 'selected' : '' }}>
                                Pendidikan Agama</option>
                            <option value="PPKN"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'PPKN' ? 'selected' : '' }}>PPKN
                            </option>
                            <option value="Sejarah"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Sejarah' ? 'selected' : '' }}>
                                Sejarah</option>
                            <option value="Informatika"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Informatika' ? 'selected' : '' }}>
                                Informatika</option>
                            <option value="Ekonomi"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Ekonomi' ? 'selected' : '' }}>
                                Ekonomi</option>
                            <option value="Fisika"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Fisika' ? 'selected' : '' }}>
                                Fisika</option>
                            <option value="Kimia"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Kimia' ? 'selected' : '' }}>
                                Kimia</option>
                            <option value="Biologi"
                                {{ old('nama_mapel', $mata_pelajaran->nama_mapel ?? '') == 'Biologi' ? 'selected' : '' }}>
                                Biologi</option>
                        </select>
                    </div>


                    {{-- Keterangan --}}
                    <div class="mb-4">
                        <label for="keterangan" class="block mb-2 text-sm font-bold text-slate-700">Keterangan</label>
                        <textarea name="keterangan" id="keterangan"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan Keterangan">{{ old('keterangan', $mata_pelajaran->keterangan ?? '') }}</textarea>
                    </div>




                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-6 mt-6">
                        <a href="{{ route('mata_pelajaran.index') }}"
                            class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition-all text-center">
                            Back
                        </a>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-all">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
