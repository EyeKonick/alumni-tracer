<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MonthlyIncomesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('monthly_incomes')->insert([
            ['income_range' => '20000 and below'],
            ['income_range' => '21000 to 30000'],
            ['income_range' => '31000 to 40000'],
            ['income_range' => '41000 to 50000'],
            ['income_range' => '51000 above'],
        ]);
    }
    public function down()
    {
        Schema::dropIfExists('mothly_incomes');
    }
}




