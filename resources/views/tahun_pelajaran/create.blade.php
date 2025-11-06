@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Tambah Tahun Pelajaran</h6>
            </div>

            @include('partials.alert')


            <div class="flex-auto p-6">
                <form action="{{ route('tahun_pelajaran.store') }}" method="POST">
                    @csrf

                    {{-- tahun --}}
                    <div class="mb-4">
                        <label for="tahun" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Tahun</label>
                        <input type="text" name="tahun" id="tahun"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Tahun">
                    </div>

                    {{-- Semester --}}
                    <div class="mb-4">
                        <label for="semester"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Semester</label>
                        <input type="number" name="semester" id="semester"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Semester">
                    </div>

                    {{-- Mulai --}}
                    <div class="mb-4">
                        <label for="mulai"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Mulai</label>
                        <input type="date" name="mulai" id="mulai"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan mulai">
                    </div>

                    {{-- Selesai --}}
                    <div class="mb-4">
                        <label for="selesai"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Selesai</label>
                        <input type="date" name="selesai" id="selesai"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan selesai">
                    </div>

                     {{-- Status --}}
                    <div class="mb-4">
                        <label for="status"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Status</label>
                        <select name="status" id="status"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan status">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Non Aktif</option>
                        </select>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-5 mt-6">
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
