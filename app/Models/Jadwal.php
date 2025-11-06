<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    // Nama tabel
    protected $table = 'jadwal';

    
    protected $fillable = [
        'guru_id', 
        'jenis_kelamin',
    ];

    
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
