<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChallengesFacedToAlumniSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumni_survey', function (Blueprint $table) {
            $table->json('challenges_faced')->nullable()->after('document_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumni_survey', function (Blueprint $table) {
            $table->dropColumn('challenges_faced');
        });
    }
}

