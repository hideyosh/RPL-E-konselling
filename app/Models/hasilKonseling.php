<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hasilKonseling extends Model
{
    protected $fillable = [
        'konseling_id',
        'ringkasan',
        'catatan_guru',
    ];

    public function konseling() {
        return $this->belongsTo(Konseling::class);
    }
}
