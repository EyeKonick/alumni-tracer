<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            'communication',
            'teamwork',
            'problem_solving',
            'initiative_and_enterprising',
            'planning_and_organizing',
            'self_management',
            'learning',
            'technical_technology',
        ];

        foreach ($skills as $skill) {
            DB::table('skills')->insert([
                'name' => $skill,
            ]);
        }
    }
}
