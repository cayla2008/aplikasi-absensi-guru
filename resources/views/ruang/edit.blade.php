@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Edit Data Ruang</h6>
            </div>

            @include('partials.alert')

            <div class="flex-auto p-6">
                <form action="{{ route('ruang.update', $ruang->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama Ruang --}}
                    <div class="mb-4">
                        <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Ruang Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="border rounded w-full p-2">
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" {{ $ruang->kelas_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Lokasi --}}
                    <div class="mb-4">
                        <label for="lokasi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Lokasi
                        </label>
                        <select name="lokasi" id="lokasi"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-blue-500 focus:outline-none">
                            <option value="">-- Pilih Lokasi --</option>
                            <option value="Lantai 1" {{ $ruang->lokasi == 'Lantai 1' ? 'selected' : '' }}>Lantai 1</option>
                            <option value="Lantai 2" {{ $ruang->lokasi == 'Lantai 2' ? 'selected' : '' }}>Lantai 2</option>
                            <option value="Gedung A" {{ $ruang->lokasi == 'Gedung A' ? 'selected' : '' }}>Gedung A</option>
                            <option value="Gedung B" {{ $ruang->lokasi == 'Gedung B' ? 'selected' : '' }}>Gedung B</option>
                            <option value="Gedung C" {{ $ruang->lokasi == 'Gedung C' ? 'selected' : '' }}>Gedung C</option>
                        </select>
                    </div>


                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-6 mt-6">
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
