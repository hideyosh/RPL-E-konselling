<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Konseling extends Model
{
    protected $fillable = [
        'siswa_id',
        'guru_id',
        'janji_temu',
        'topik_masalah',
        'status'
    ];

    public function siswa() : BelongsTo {
        return $this->belongsTo(Siswa::class);
    }

    public function guru() : BelongsTo {
        return $this->belongsTo(Guru::class);
    }

    public function hasilKonseling() : HasOne {
        return $this->hasOne(hasilKonseling::class);
    }

}
