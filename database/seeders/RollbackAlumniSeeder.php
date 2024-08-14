<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollbackAlumniSeeder extends Seeder
{
    /**
     * Reverse the seed of the database.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all IDs of alumni that were created by the seeder
        $alumniIds = DB::table('alumnis')->pluck('id')->toArray();

        // Delete records from PersonalData, ProfessionalData, and SurveyData
        DB::table('personal_data')->whereIn('alumni_id', $alumniIds)->delete();
        DB::table('professional_data')->whereIn('alumni_id', $alumniIds)->delete();
        DB::table('survey_data')->whereIn('alumni_id', $alumniIds)->delete();

        // Finally, delete the alumni records
        DB::table('alumnis')->whereIn('id', $alumniIds)->delete();
    }
}
