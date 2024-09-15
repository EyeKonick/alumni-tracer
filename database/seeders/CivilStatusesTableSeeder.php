<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivilStatusesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('civil_statuses')->insert([
            ['status_name' => 'Single'],
            ['status_name' => 'Married'],
            ['status_name' => 'Separated'],
            ['status_name' => 'Widow'],
        ]);
    }
}
