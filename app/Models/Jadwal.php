<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'guru_id',
        'tahun_pelajaran_id',
        'mata_pelajaran_id',
        'kelas_id',
        'ruang_id',
        'jam_mulai_id',
        'jam_selesai_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }

    public function jamMulai()
    {
        return $this->belongsTo(Jam::class, 'jam_mulai_id');
    }

    public function jamSelesai()
    {
        return $this->belongsTo(Jam::class, 'jam_selesai_id');
    }

    public function tahunPelajaran()
    {
        return $this->belongsTo(TahunPelajaran::class, 'tahun_pelajaran_id');
    }

    public function details()
    {
        return $this->hasMany(TrJadwalMapel::class, 'jadwal_id');
    }
}
