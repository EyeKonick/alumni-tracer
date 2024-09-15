<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentStatusesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('employment_statuses')->insert([
            ['status_name' => 'Casual'],
            ['status_name' => 'Probationary'],
            ['status_name' => 'Regular'],
        ]);
    }
}
