<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'name' => 'Анна',
                'email' => 'sorok@gmail.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Мария',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('password')
            ]
        ]);
    }
}
