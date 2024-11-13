<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab1 extends Model
{
    use HasFactory;
    // kode_opd -> Bappeda
    // tahun -> 2024
    // nama bab 1 -> bab 1 Renstra
    // bab 1 -> bab 1 Renja
    // input bab 1
    // pilih -> jenis -> 'Renstra'

    protected $fillable = [
        'nama_bab',
        'jenis_id',
        'nama_opd',
        'bidang_urusan',
        'bidang1',
        'bidang2',
        'bidang3',
        'kode_opd',
        'tahun_id',
        'dasar_hukum',
        'uraian',
    ];

    public function tahun()
    {
        return $this->belongsTo(TahunDokumen::class);
    }


    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
