<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonalData;
use App\Models\ProfessionalData;
use App\Models\AlumniSurvey;
use App\Models\Gender;
use App\Models\Challenge;
use App\Models\CivilStatus;
use App\Models\Course;
use App\Models\EmploymentStatus;
use App\Models\MonthlyIncome;
use App\Models\Skill;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SurveySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create base data for relations
        $genders = Gender::all()->pluck('id')->toArray();
        $civilStatuses = CivilStatus::all()->pluck('id')->toArray();
        $courses = Course::all()->pluck('id')->toArray();
        $employmentStatuses = EmploymentStatus::all()->pluck('id')->toArray();
        $monthlyIncomes = MonthlyIncome::all()->pluck('id')->toArray();
        $skills = Skill::all()->pluck('id')->toArray();
        $challenges = Challenge::all()->pluck('id')->toArray();

        // Loop to create 15 samples
        for ($i = 0; $i < 15; $i++) {
            DB::transaction(function () use ($faker, $genders, $civilStatuses, $courses, $employmentStatuses, $monthlyIncomes, $skills, $challenges) {
                // Create Personal Data
                $personalData = PersonalData::create([
                    'first_name' => $faker->firstName,
                    'middle_name' => $faker->optional()->firstName,
                    'last_name' => $faker->lastName,
                    'gender_id' => $faker->randomElement($genders),
                    'age' => $faker->numberBetween(22, 60),
                    'civil_status_id' => $faker->randomElement($civilStatuses),
                    'year_graduated' => $faker->numberBetween(2000, 2023),
                    'course_graduated_id' => $faker->randomElement($courses),
                    'home_address' => $faker->address,
                    'cellphone_number' => $faker->regexify('09[0-9]{9}'),
                    'email' => $faker->unique()->safeEmail,
                ]);

                // Create Professional Data
                $professionalData = ProfessionalData::create([
                    'alumni_id' => $personalData->id,
                    'company_name' => $faker->company,
                    'company_address' => $faker->address,
                    'employer' => $faker->company,
                    'employer_address' => $faker->address,
                    'employment_status_id' => $faker->randomElement($employmentStatuses),
                    'present_position' => $faker->jobTitle,
                    'inclusive_from' => $faker->numberBetween(2010, 2020),
                    'inclusive_to' => $faker->numberBetween(2021, 2024),
                    'monthly_income_id' => $faker->randomElement($monthlyIncomes),
                ]);

                // Attach random skills to the Professional Data
                $professionalData->skills()->sync($faker->randomElements($skills, $faker->numberBetween(1, 3)));

                // Generate a simulated document path (if needed)
                $documentPath = $faker->optional()->fileExtension;

                // Create Alumni Survey
                AlumniSurvey::create([
                    'alumni_id' => $personalData->id,
                    'degree_skills_in_line' => $faker->boolean,
                    'suggestions' => $faker->sentence,
                    'document_path' => $documentPath ? 'documents/sample.' . $documentPath : null,
                    'challenges_faced' => json_encode($faker->randomElements($challenges, $faker->numberBetween(1, 3))),
                ]);
            });
        }
    }
}
