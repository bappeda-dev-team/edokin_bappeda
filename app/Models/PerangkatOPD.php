<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perangkatOPD extends Model
{
    use HasFactory;
    protected $fillable =[
        'kode_opd',
        'nama_opd',
        'urusan_opd',
        'kode_urusan',
        'urusan',
        'bidang_urusan_opd',
        'kode_bidang_urusan',
        'bidang_urusan',
    ];
}
