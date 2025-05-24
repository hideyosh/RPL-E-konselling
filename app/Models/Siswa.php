<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'nisn',
        'kelas',
        'jurusan',
        'jenis_kelamin'
    ];

    public function User() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function Pengaduan() : HasMany {
        return $this->hasMany(Pengaduan::class);
    }
}
