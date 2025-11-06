@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Tambah Guru</h6>
            </div>

            @include('partials.alert')

            <div class="flex-auto p-6">
                <form action="{{ route('guru.store') }}" method="POST">
                    @csrf

                    {{-- Nama Guru --}}
                    <div class="mb-4">
                        <label for="nama_guru" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama
                            Guru</label>
                        <input type="text" name="nama_guru" id="nama_guru"
                            class="focus:shadow-primary-outline  text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Nama Guru">
                    </div>

                    {{-- NIP --}}
                    <div class="mb-4">
                        <label for="nip" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">NIP</label>
                        <input type="text" name="nip" id="nip"
                            class="focus:shadow-primary-outline  text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan NIP">
                    </div>


                    {{-- Jenis Kelamin --}}
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                            Jenis Kelamin
                        </label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg 
                                border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 
                                        outline-none transition-all focus:border-blue-500 focus:outline-none">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="lelaki">Lelaki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                        <input type="email" name="email" id="email"
                            class="focus:shadow-primary-outline  text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Email">
                    </div>

                    {{-- Nomor HP --}}
                    <div class="mb-4">
                        <label for="no_tlp" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nomor
                            HP</label>
                        <input type="text" name="no_tlp" id="no_tlp"
                            class="focus:shadow-primary-outline  text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Nomor HP">
                    </div>


                    {{-- Alamat --}}
                    <div class="mb-4">
                        <label for="alamat" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Alamat</label>
                        <textarea name="alamat" id="alamat"
                            class="focus:shadow-primary-outline  text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Mata Pelajaran"></textarea>
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="focus:shadow-primary-outline  text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan password">
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-5 mt-6">
                        <a href="{{ route('guru.index') }}"
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
