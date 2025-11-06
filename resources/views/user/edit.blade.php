@extends('layouts.app')

@section('content')
    <div class="w-full px-4 py-6 mx-auto">
        @include('partials.alert')

        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid border-gray-200 rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Edit Data User</h6>
            </div>


            <div class="flex-auto p-6">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Username --}}
                    <div class="mb-4">
                        <label for="name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama
                            User</label>
                        <input type="text" name="name" id="name"
                             value="{{ old('name', $user->name) }}"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Nama User">
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                        <textarea name="email" id="email"
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan email">{{ old('email', $user->email) }}</textarea>
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password"
                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                        <input type="password" name="password" id="password"
                           
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Masukkan Password">
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end gap-6 mt-6">
                         <a href="{{ route('user.index') }}"
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
