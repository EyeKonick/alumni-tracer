<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfessionalData;
use App\Models\Alumni;

class ProfessionalDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $alumni = Alumni::first(); // Assuming the first alumni record

        ProfessionalData::create([
            'alumni_id' => $alumni->id,
            'company_name' => 'Tech Innovations Inc.',
            'company_address' => '456 Tech Drive, Some City',
            'present_position' => 'Software Developer',
            'monthly_income' => 5000.00,
            'employment_status' => 'Employed',
            'inclusive_from' => 2016,
            'inclusive_to' => 2024,
            'skills' => json_encode(['Programming', 'Project Management']),
        ]);
    }
}
