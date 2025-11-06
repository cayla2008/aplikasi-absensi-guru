@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Tambah Jam</h6>
            </div>

            @include('partials.alert')

            <div class="flex-auto p-6">
                <form action="{{ route('jam.store') }}" method="POST">
                    @csrf

                    {{-- Jam Mulai --}}
                    <div class="mb-4">
                        <label for="jam_mulai" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Jam Mulai
                        </label>
                        <input type="time" name="jam_mulai" id="jam_mulai"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                    </div>

                    {{-- Jam Selesai --}}
                    <div class="mb-4">
                        <label for="jam_selesai" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Jam Selesai
                        </label>
                        <input type="time" name="jam_selesai" id="jam_selesai"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-5 mt-6">
                        <a href="{{ route('jam.index') }}"
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
