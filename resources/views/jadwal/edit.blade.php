@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Edit Data Jadwal</h6>
            </div>
            
            @include('partials.alert')
            
            <div class="flex-auto p-6">
               <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama Guru --}}
                    <div class="mb-4">
                        <label for="nama_guru" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama
                            Guru</label>
                        <input type="text" name="nama_guru" id="nama_guru"
                            value="{{ old('nama_guru', $jadwal->nama_guru) }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Nama Guru">
                    </div>

                    {{-- Jenis Kelamin--}}
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">L/P</label>
                        <textarea name="jenis_kelamin" id="jenis_kelamin"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan jenis kelamin">{{ old('jenis_kelamin', $jadwal->jenis_kelamin) }}</textarea> 
                    </div>

                    {{-- Nomor HP --}}
                    {{-- <div class="mb-4">
                        <label for="no_tlp" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nomor
                            HP</label>
                        <input type="text" name="no_tlp" id="no_tlp"
                            class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Nomor HP">
                    </div> --}}

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-6 mt-6">
                        <a href="{{ route('jadwal.index') }}"
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
