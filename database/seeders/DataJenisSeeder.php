<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis')->insert([
            [
                'id' => '1',
                'jenis' => 'Renstra',
            ],
            [
                'id' => '2',
                'jenis' => 'Renja',
            ],
           
        ]);

    }
}
