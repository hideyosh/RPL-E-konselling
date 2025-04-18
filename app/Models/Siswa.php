<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    public function User() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
