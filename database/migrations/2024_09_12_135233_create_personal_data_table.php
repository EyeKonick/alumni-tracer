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
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('civil_status_id')->constrained('civil_statuses');
            $table->year('year_graduated');
            $table->foreignId('course_graduated_id')->constrained('courses');
            $table->text('home_address');
            $table->string('cellphone_number', 11);
            $table->string('email')->unique();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
