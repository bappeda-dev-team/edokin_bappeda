<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab5 extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_bab',
        'jenis_id',
        'kode_opd',
        'tahun_id',
        'tujuan_opd',
        'strategi',
        'arah_kebijakan',
    ];
}
