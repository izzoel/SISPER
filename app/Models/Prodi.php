<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = [
        'prodi',
        'kaprodi',
        'nik',
        'tanggal_terbit',
        'akreditasi',
        'nomor_akreditasi',
    ];
}
