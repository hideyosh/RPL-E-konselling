<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    protected $fillable = [
        'siswa_id',
        'guru_id',
        'isi_pengaduan',
        'status',
    ];

    public function siswa() : BelongsTo {
        return $this->belongsTo(Siswa::class);
    }
    public function guru() : BelongsTo {
        return $this->belongsTo(Guru::class);
    }

}
