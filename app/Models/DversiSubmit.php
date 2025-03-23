<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DversiSubmit extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'fakultas',
        'prodi',
        'gelar',
        'pisn',
        'periode_lulus',
        'dokumen',
        'pdf',
        'tanggal_yudisium',
        'status',
        'ijazah'
    ];
}
