<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataTahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahun_dokumen')->insert([
            [
                'id' => '1',
                'tahun' => '2024',
            ],
            [
                'id' => '2',
                'tahun' => '2025',
            ],
            [
                'id' => '3',
                'tahun' => '2026',
            ],
        ]);

    }
}
