@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Edit Data Tahun Pelajaran</h6>
            </div>
           
           @include('partials.alert')
           
           
            <div class="flex-auto p-6">
                <form action="{{ route('tahun_pelajaran.update', $tahun_pelajaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- tahun --}}
                    <div class="mb-4">
                        <label for="tahun" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tahun</label>
                        <input type="text" name="tahun" id="tahun"
                            value="{{ old('tahun', $tahun_pelajaran->tahun) }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Tahun">
                    </div>

                    {{-- semester --}}
                    <div class="mb-4">
                        <label for="semester" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Semester</label>
                        <textarea name="semester" id="semester"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan semester">{{ old('semester', $tahun_pelajaran->semester) }}</textarea> 
                    </div>

                     {{-- mulai --}}
                    <div class="mb-4">
                        <label for="mulai" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Mulai</label>
                        <input type="text" name="mulai" id="mulai"
                            value="{{ old('mulai', $tahun_pelajaran->mulai) }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan mulai">
                    </div>

                     {{-- selesai --}}
                    <div class="mb-4">
                        <label for="selesai" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Selesai</label>
                        <input type="text" name="selesai" id="selesai"
                            value="{{ old('selesai', $tahun_pelajaran->selesai) }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Selesai">
                    </div>

                     {{-- status --}}
                    <div class="mb-4">
                        <label for="status" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Status</label>
                        <input type="text" name="status" id="status"
                            value="{{ old('status', $tahun_pelajaran->status) }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan status">
                    </div>

                    {{-- Nomor HP --}}
                    {{-- <div class="mb-4">
                        <label for="no_tlp" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nomor
                            HP</label>
                        <input type="text" name="no_tlp" id="no_tlp"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Nomor HP">
                    </div> --}}

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-6 mt-6">
                         <a href="{{ route('tahun_pelajaran.index') }}"
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
