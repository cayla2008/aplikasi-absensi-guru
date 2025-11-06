@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Tambah Ruang</h6>
            </div>

            @include('partials.alert')

            <div class="flex-auto p-6">
                <form action="{{ route('ruang.store') }}" method="POST">
                    @csrf

                    {{-- Nama Ruang --}}
                    <div class="mb-4">
                        <label for="nama_ruang" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Nama Ruang
                        </label>
                        <select name="nama_ruang" id="nama_ruang"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:outline-none">
                            <option value="">-- Pilih Nama Ruang --</option>
                            <option value="Ruang Kelas 1">Ruang Kelas 1</option>
                            <option value="Ruang Kelas 2">Ruang Kelas 2</option>
                            <option value="Lab Komputer">Lab Komputer</option>
                            <option value="Perpustakaan">Perpustakaan</option>
                            <option value="Aula">Aula</option>
                        </select>
                    </div>

                    {{-- Lokasi --}}
                    <div class="mb-4">
                        <label for="lokasi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Lokasi
                        </label>
                        <select name="lokasi" id="lokasi"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:outline-none">
                            <option value="">-- Pilih Lokasi --</option>
                            <option value="Lantai 1">Lantai 1</option>
                            <option value="Lantai 2">Lantai 2</option>
                            <option value="Gedung A">Gedung A</option>
                            <option value="Gedung B">Gedung B</option>
                            <option value="Gedung C">Gedung C</option>
                        </select>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end gap-5 mt-6">
                        <a href="{{ route('ruang.index') }}"
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
