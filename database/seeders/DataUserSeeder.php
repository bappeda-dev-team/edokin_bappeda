<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class DataUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // DB::table('users')->insert([
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('123456'),
                'role' => 0,
            ],
            [
                'name' => 'opd bappeda',
                'email' => 'opd1@test.com',
                'password' => Hash::make('123456'),
                'role' => 1,
                'kode_opd' => '5.01.5.05.0.00.02.0000'
            ],

            [
                'name' => 'opd bkpsdm',
                'email' => 'opd2@test.com',
                'password' => Hash::make('123456'),
                'role' => 1,
                'kode_opd' => '5.03.5.04.0.00.01.0000'
            ],
        ];
        // ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
        // );
    }
}
