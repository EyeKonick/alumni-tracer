<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            'Male',
            'Female',
            'Non-binary',
            'Prefer not to say',
            'Other'
        ];

        foreach ($genders as $gender) {
            DB::table('genders')->insert([
                'name' => $gender
            ]);
        }
    }
}
