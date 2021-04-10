<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransmissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transmissions')->insert([
            [
                'name' => 'Механика'
            ],
            [
                'name' => 'Автомат'
            ]
        ]);
    }
}
