<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autos')->insert([
            [
            'city' => 'Киев',
            'brand' => 'Mazda',
            'model' => '6',
            'color' => 'Белый',
            'issue_year' => 2015,
            'mileage' => 98,
            'price' => 13000,
            'seller_name' => 'Михаил',
            'seller_phone' => '+380993456789',
            'img' => 'https://s0.rbk.ru/v6_top_pics/media/img/7/68/755873760507687.jpg',
            'fuel_id' => 1,
            'transmission_id' => 1,
            'type_id' => 1,
            'user_id' => 1
            ],
            [
                'city' => 'Краматорск',
                'brand' => 'Toyota',
                'model' => 'Camry',
                'color' => 'Черный',
                'issue_year' => 2016,
                'mileage' => 95,
                'price' => 14000,
                'seller_name' => 'Александр',
                'seller_phone' => '+380997853245',
                'img' => 'https://s0.rbk.ru/v6_top_pics/media/img/7/68/755873760507687.jpg',
                'fuel_id' => 1,
                'transmission_id' => 2,
                'type_id' => 3,
                'user_id' => 2
            ],
            [
                'city' => 'Харьков',
                'brand' => 'Peugeot',
                'model' => '301',
                'color' => 'Металлик',
                'issue_year' => 2017,
                'mileage' => 65,
                'price' => 12000,
                'seller_name' => 'Андрей',
                'seller_phone' => '+380985809575',
                'img' => 'https://s0.rbk.ru/v6_top_pics/media/img/7/68/755873760507687.jpg',
                'fuel_id' => 2,
                'transmission_id' => 2,
                'type_id' => 2,
                'user_id' => 3
            ]
        ]);
    }
}
