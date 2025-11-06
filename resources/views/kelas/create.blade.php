@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Tambah Kelas</h6>
            </div>

            @include('partials.alert')
            

            <div class="flex-auto p-6">
                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf

                    {{-- Nama Kelas --}}
                    <div class="mb-4">
                        <label for="nama_kelas" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Nama Kelas
                        </label>
                        <select name="nama_kelas" id="nama_kelas"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700  outline-none transition-all focus:border-blue-500 focus:outline-none">
                            <option value="">-- Pilih Nama Kelas --</option>
                            <option value="X">Kelas X</option>
                            <option value="XI">Kelas XI</option>
                            <option value="XII">Kelas XII</option>
                        </select>
                    </div>

                    {{-- Jurusan --}}
                    <div class="mb-4">
                        <label for="jurusan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Jurusan
                        </label>
                        <select name="jurusan" id="jurusan"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:outline-none">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                            <option value="TKJ">Teknik Komputer dan Jaringan (TKJ)</option>
                            <option value="AKL">Akuntansi dan Keuangan Lembaga (AKL)</option>
                            <option value="OTKP">Otomatisasi dan Tata Kelola Perkantoran (OTKP)</option>
                            <option value="BDP">Bisnis Daring dan Pemasaran (BDP)</option>
                        </select>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-5 mt-6">
                        <a href="{{ route('kelas.index') }}"
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
