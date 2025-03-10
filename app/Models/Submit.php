<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'prodi',
        'gelar',
        'pisn',
        'masuk',
        'yudisium',
        'judul',
        'toefl',
        'kejuaraan',
        'sertifikat',
        'beasiswa',
        'organisasi',
        'status',
        'dokumen'
    ];
}
