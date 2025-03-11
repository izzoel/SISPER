<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'prodi',
        'kaprodi',
        'nik',
        'tanggal_terbit',
    ];
}
