<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = [
        'fakultas',
        'dekan',
        'nik',
        'tanggal_terbit',
    ];
}
