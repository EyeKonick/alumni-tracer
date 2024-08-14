<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonalData;
use App\Models\Alumni;

class PersonalDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $alumni = Alumni::first(); // Assuming the first alumni record

        PersonalData::create([
            'alumni_id' => $alumni->id,
            'gender' => 'Male',
            'age' => 30,
            'civil_status' => 'Single',
            'grad_year' => 2015,
            'grad_course' => 'Computer Science',
            'major' => 'Software Engineering',
            'address' => '123 Elm Street, Some City',
            'phone_number' => '123-456-7890',
        ]);
    }
}
