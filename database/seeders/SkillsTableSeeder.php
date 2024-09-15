<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('skills')->insert([
            ['skill_name' => 'Communication'],
            ['skill_name' => 'Teamwork'],
            ['skill_name' => 'Problem Solving'],
            ['skill_name' => 'Initiative and Enterprising'],
            ['skill_name' => 'Planning and Organizing'],
            ['skill_name' => 'Self Management'],
            ['skill_name' => 'Learning'],
            ['skill_name' => 'Technical/Technology'],
        ]);
    }
}
