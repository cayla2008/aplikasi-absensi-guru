@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <h6 class="text-xl font-extrabold text-white mb-6">Edit Jadwal</h6>

        @include('partials.alert')

        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- LEFT CARD -->
                <div class="bg-white shadow-xl rounded-2xl p-6">
                    <h6 class="text-sm font-semibold text-slate-600 mb-4 text-center">Data Utama</h6>

                    {{-- Guru --}}
                    <div class="mb-4">
                        <label for="guru_id" class="block mb-2 text-sm font-bold text-slate-700">Guru</label>
                        <select name="guru_id" id="guru_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Guru --</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ $jadwal->guru_id == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama_guru }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tahun Pelajaran --}}
                    <div class="mb-4">
                        <label for="tahun_pelajaran_id" class="block mb-2 text-sm font-bold text-slate-700">Tahun
                            Pelajaran</label>
                        <select name="tahun_pelajaran_id" id="tahun_pelajaran_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Tahun --</option>
                            @foreach ($tahunPelajarans as $tahun)
                                <option value="{{ $tahun->id }}"
                                    {{ $jadwal->tahun_pelajaran_id == $tahun->id ? 'selected' : '' }}>
                                    {{ $tahun->tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- RIGHT CARD -->
                <div class="bg-white shadow-xl rounded-2xl p-6" x-data="{ accordions: {{ json_encode($jadwal->details->map(fn($d) => true)->toArray() ?: [true]) }} }">

                    <div x-data="{
                        details: {{ json_encode(
                            $jadwal->details->map(
                                fn($d) => [
                                    'mata_pelajaran_id' => $d->mata_pelajaran_id,
                                    'hari' => $d->hari,
                                    'kelas_id' => $d->kelas_id,
                                    'jam_mulai_id' => $d->jam_mulai_id,
                                    'jam_selesai_id' => $d->jam_selesai_id,
                                ],
                            ),
                        ) }},
                        accordions: {{ json_encode(array_fill(0, $jadwal->details->count(), false)) }}
                    }">

                        <div class="flex justify-between items-center mb-4">
                            <h6 class="text-slate-700 text-lg font-bold">Detail Jadwal</h6>
                            <!-- ADD NEW DETAIL BUTTON -->
                            <button type="button"
                                class="bg-blue-500 hover:bg-blue-600 text-white w-8 h-8 rounded-full font-bold flex items-center justify-center mt-4"
                                @click="details.push({ mata_pelajaran_id: '', hari: '', kelas_id: '', jam_mulai_id: '', jam_selesai_id: '' }); accordions.push(true)">
                                +
                            </button>
                        </div>

                        <template x-for="(detail, index) in details" :key="index">
                            <div class="border border-gray-200 rounded-lg mb-3 overflow-hidden">
                                <button type="button"
                                    class="w-full bg-gray-100 px-4 py-2 flex justify-between items-center text-sm font-semibold text-slate-700 hover:bg-gray-200"
                                    @click="accordions[index] = !accordions[index]">
                                    Jadwal <span x-text="accordions[index] ? '−' : '+'"></span>
                                </button>

                                <div x-show="accordions[index]" x-collapse class="p-4 bg-white border-t border-gray-200">
                                    <!-- MATA PELAJARAN -->
                                    <div class="mb-4">
                                        <label class="block mb-2 text-sm font-bold text-slate-700">Mata Pelajaran</label>
                                        <select :name="`details[${index}][mata_pelajaran_id]`"
                                            x-model="detail.mata_pelajaran_id"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                            <option value="">-- Pilih Mapel --</option>
                                            @foreach ($mataPelajarans as $mapel)
                                                <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <!-- HARI -->
                                        <div class="mb-4">
                                            <label class="block mb-2 text-sm font-bold text-slate-700">Hari</label>
                                            <select :name="`details[${index}][hari]`" x-model="detail.hari"
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                                <option value="">-- Pilih Hari --</option>
                                                <option>Senin</option>
                                                <option>Selasa</option>
                                                <option>Rabu</option>
                                                <option>Kamis</option>
                                                <option>Jumat</option>
                                            </select>
                                        </div>

                                        <!-- KELAS -->
                                        <div class="mb-4">
                                            <label class="block mb-2 text-sm font-bold text-slate-700">Kelas</label>
                                            <select :name="`details[${index}][kelas_id]`" x-model="detail.kelas_id"
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                                <option value="">-- Pilih Kelas --</option>
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->id }}">
                                                        {{ $k->nama_kelas . ' - ' . $k->jurusan }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- JAM MULAI -->
                                        <div class="mb-4">
                                            <label class="block mb-2 text-sm font-bold text-slate-700">Jam Mulai</label>
                                            <select :name="`details[${index}][jam_mulai_id]`" x-model="detail.jam_mulai_id"
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                                <option value="">-- Pilih Jam Mulai --</option>
                                                @foreach ($jams as $jam)
                                                    <option value="{{ $jam->id }}">
                                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $jam->jam_mulai)->format('H:i') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- JAM SELESAI -->
                                        <div class="mb-4">
                                            <label class="block mb-2 text-sm font-bold text-slate-700">Jam Selesai</label>
                                            <select :name="`details[${index}][jam_selesai_id]`"
                                                x-model="detail.jam_selesai_id"
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                                <option value="">-- Pilih Jam Selesai --</option>
                                                @foreach ($jams as $jam)
                                                    <option value="{{ $jam->id }}">
                                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $jam->jam_selesai)->format('H:i') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>


                    </div>

                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-5 mt-8">
                <a href="{{ route('jadwal.index') }}"
                    class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition-all">
                    Back
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-all">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
