<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FuelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuels')->insert([
            [
                'name' => 'Бензин'
            ],
            [
                'name' => 'Дизель'
            ],
            [
                'uname' => 'Газ'
            ],
            [
                'uname' => 'Электро'
            ]
        ]);
    }
}
