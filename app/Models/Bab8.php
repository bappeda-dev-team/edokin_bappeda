<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab8 extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_bab',
        'jenis_id',
        'kode_opd',
        'nama_kepala_opd',
        'nip_kepala_opd',
        'tanggal',
        'tahun_id',
        'uraian',
    ];

    public function tahun()
    {
        return $this->belongsTo(TahunDokumen::class, 'tahun_id');
    }
    
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
    
    public function opd()
    {
        return $this->belongsTo(OPD::class, 'kode_opd', 'kode_opd'); // Adjust 'kode_opd' based on the foreign key and local key
    }
}
