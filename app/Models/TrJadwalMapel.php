<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrJadwalMapel extends Model
{
    protected $table = 'tr_jadwal_mapel';

    protected $fillable = [
        'jadwal_id',
        'kelas_id',
        'mata_pelajaran_id',
        'jam_mulai_id',
        'jam_selesai_id',
        'hari',
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }


    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function jamMulai()
    {
        return $this->belongsTo(Jam::class, 'jam_mulai_id');
    }

    public function jamSelesai()
    {
        return $this->belongsTo(Jam::class, 'jam_selesai_id');
    }
}
