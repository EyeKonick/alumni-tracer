<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('challenges')->insert([
            ['challenge_name' => 'Job Hunting'],
            ['challenge_name' => 'Employment Interview'],
            ['challenge_name' => 'Work Environment'],
            ['challenge_name' => 'Management and Peer Relationship'],
            ['challenge_name' => 'Promotion'],
            ['challenge_name' => 'Personal Problem'],
            ['challenge_name' => 'Career Development'],
            ['challenge_name' => 'Work Life Balance'],
        ]);
    }
}
