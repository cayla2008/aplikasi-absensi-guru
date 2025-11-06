<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{   

    protected $table = 'gurus';
    protected $fillable = [
        "nama_guru", "nip", "jenis_kelamin", "email", "no_tlp", "alamat", "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
