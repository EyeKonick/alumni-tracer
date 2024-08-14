<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $challenges = [
            'Job Hunting',
            'Employment Interview',
            'Work Environment',
            'Management and peer relationship',
            'Promotion',
            'Personal Problem',
            'Career Development',
            'Work life balance',
        ];

        foreach ($challenges as $challenge) {
            DB::table('challenges')->insert([
                'name' => $challenge
            ]);
        }
    }
}
