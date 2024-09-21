<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DversiVerifikasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'pisn',
        'nim',
        'nama',
        'ttl',
        'nik',
        'fakultas',
        'prodi',
        'lulus',
        'gelar',
        'ijazah',
        'verifikasi',
    ];
}
