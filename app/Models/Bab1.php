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
        'kode_opd', // Tambahkan ini jika 'kode_opd' juga dapat diisi secara massal
        'nama_bab',
        'jenis_id',
        'tahun_id',
        'latar_belakang',
        'dasar_hukum',
        'maksud_tujuan',
        'sistematika_penulisan',
    ];

    public function tahun()
    {
        return $this->belongsTo(TahunDokumen::class);
    }


    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
        // return $this->belongsTo(Tahun::class, 'tahun_id');
    }
}
