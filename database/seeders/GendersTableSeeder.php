<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('genders')->insert([
            ['gender_name' => 'Male'],
            ['gender_name' => 'Female'],
            ['gender_name' => 'Others'],
        ]);
    }
}
