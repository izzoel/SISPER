<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForbelaSubmit extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'jenis',
        'no_surat',
        'tanggal_penelitian',
        'email',
        'pembayaran',
        'surat',
        'judul',
        'fakultas',
        'prodi',
        'status',
    ];
}
