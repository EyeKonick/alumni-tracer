<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('alumni_survey', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('personal_data');
            $table->boolean('degree_skills_in_line');
            $table->text('challenges_faced');
            $table->text('suggestions');
            $table->string('document_path')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_survey');
    }
};
