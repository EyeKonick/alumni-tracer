<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalInfoTextToAlumniSurveyTable extends Migration
{
    public function up()
    {
        Schema::table('alumni_survey', function (Blueprint $table) {
            $table->text('additional_info_text')->nullable()->after('suggestions');
        });
    }

    public function down()
    {
        Schema::table('alumni_survey', function (Blueprint $table) {
            $table->dropColumn('additional_info_text');
        });
    }
}

