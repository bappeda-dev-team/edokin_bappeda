<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunDokumen extends Model
{
    use HasFactory;
    protected $table = 'tahun_dokumen';
    protected $fillable = [
        'id_tahun',
        'tahun',
    ];
}
