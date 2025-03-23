<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForpiSubmit extends Model
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
        'tanggal_yudisium',
        'judul',
        'toefl',
        'kejuaraan',
        'sertifikat',
        'beasiswa',
        'organisasi',
        'periode_lulus',
        'status',
        'dokumen'
    ];
}
