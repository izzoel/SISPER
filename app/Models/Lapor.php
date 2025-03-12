<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    protected $fillable = [
        'nim',
        'lapor',
        'menu',
        'status'
    ];
}
