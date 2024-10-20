<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            ['course_name' => 'BSCS'],
            ['course_name' => 'BSOA'],
            ['course_name' => 'BSFT'],
            ['course_name' => 'BAEL'],
        ]);

        /* DB::table('courses')->insert([
            ['course_name' => 'AB ECON - Bachelor of Arts Major in Economics'],
            ['course_name' => 'AB POL SCI - Bachelor of Arts Major in Political Science'],
        ]); */

    }
}
