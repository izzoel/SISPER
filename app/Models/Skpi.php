<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Filesystem\FilesystemAdapter
 */


class Skpi extends Model
{
    use HasFactory;
    protected $table = 'skpi';
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'program_studi',
        'nim',
        'lama_studi',
        'tahun_masuk',
        'tanggal_lulus',
        'judul',
        'ijazah',
        'toefl',
        'pencapaian',
        'sertifikasi',
        'beasiswa',
        'organisasi',
        'status_warna',
        'status_keterangan'
    ];
}
