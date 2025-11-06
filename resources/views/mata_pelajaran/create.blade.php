@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Tambah Mata Pelajaran</h6>
            </div>

            @include('partials.alert')


            <div class="flex-auto p-6">
                <form action="{{ route('mata_pelajaran.store') }}" method="POST">
                    @csrf

                    {{-- Nama Mapel --}}
                    <div class="mb-4">
                        <label for="nama_mapel" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Nama Mapel
                        </label>
                        <select name="nama_mapel" id="nama_mapel"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            <option value="">-- Pilih Nama Mapel --</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Pendidikan Agama">Pendidikan Agama</option>
                            <option value="PPKN">PPKN</option>
                            <option value="Sejarah">Sejarah</option>
                            <option value="Informatika">Informatika</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Biologi">Biologi</option>
                        </select>
                    </div>


                    {{-- Keterangan --}}
                    <div class="mb-4">
                        <label for="keterangan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Keterangan
                        </label>
                        <textarea name="keterangan" id="keterangan"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Keterangan">{{ old('keterangan', $mata_pelajaran->keterangan ?? '') }}</textarea>
                    </div>



                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-5 mt-6">
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
