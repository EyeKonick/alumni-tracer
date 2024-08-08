<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            'BSCS',
            'BSA',
            'BSIT',
            'CTE',
            'Other'
        ];

        foreach ($courses as $course) {
            DB::table('course')->insert([
                'course_name' => $course
            ]);
        }
    }
}
