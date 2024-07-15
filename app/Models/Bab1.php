<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'latar_belakang',
        'dasar_hukum',
        'maksud_tujuan',
        'sistematika_penulisan',
    ];
}
