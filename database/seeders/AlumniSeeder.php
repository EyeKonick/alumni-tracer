<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Alumni;
use App\Models\Course;
use App\Models\Gender;
use App\Models\Challenges;
use App\Models\SurveyData;
use Faker\Factory as Faker;
use App\Models\PersonalData;
use Illuminate\Database\Seeder;
use App\Models\ProfessionalData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlumniSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Fetch data from other tables
        $genders = Gender::pluck('name')->toArray();
        $courses = Course::pluck('course_name')->toArray();
        $skills = Skill::pluck('name')->toArray();
        $challenges = Challenges::pluck('name')->toArray();

        // Create multiple alumni records
        foreach (range(1, 10) as $index) {
            // Create Alumni
            $alumni = Alumni::create([
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'), // Default password for all users
            ]);

            // Create PersonalData
            PersonalData::create([
                'alumni_id' => $alumni->id,
                'gender' => $faker->randomElement(['1', '2', '3', '4','5']),
                'age' => $faker->numberBetween(20, 50),
                'civil_status' => $faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
                'grad_year' => $faker->year,
                'grad_course' => $faker->randomElement(['1', '2', '3', '4','5']),
                'major' => $faker->word,
                'address' => $faker->address,
                'phone_number' => ('09090909099'),
            ]);

            // Create ProfessionalData
            ProfessionalData::create([
                'alumni_id' => $alumni->id,
                'company_name' => $faker->company,
                'company_address' => $faker->address,
                'present_position' => $faker->jobTitle,
                'monthly_income' => $faker->randomFloat(2, 2000, 10000),
                'employment_status' => $faker->randomElement(['Employed', 'Unemployed', 'Freelance']),
                'inclusive_from' => $faker->year,
                'inclusive_to' => $faker->year,
                'skills' => $faker->randomElement(['1', '2', '3', '4','5','6','7','8']), // Randomly select skills
            ]);

            // Create SurveyData
            SurveyData::create([
                'alumni_id' => $alumni->id,
                'question1' => $faker->randomElement(['Yes', 'No']),
                'question1_answer' => ('sample sentence'),
                'challenges' => $faker->randomElement(['1', '2', '3', '4','5','6','7','8']), // Randomly select challenges
                'suggestions' => ('sample sentence'),
                'file_path' => $faker->optional()->fileExtension ? 'survey_files/' . $faker->fileExtension : null,
            ]);
        }
    }
}
