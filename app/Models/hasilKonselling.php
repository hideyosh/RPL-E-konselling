<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hasilKonselling extends Model
{
    protected $fillable = [
        'konseling_id',
        'ringkasan',
        'catatan_guru',
    ];
}
