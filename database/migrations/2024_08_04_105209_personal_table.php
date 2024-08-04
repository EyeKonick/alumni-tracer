<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumnis')->onDelete('cascade');
            $table->string('gender');
            $table->unsignedTinyInteger('age');
            $table->string('civil_status');
            $table->year('grad_year');
            $table->string('grad_course');
            $table->string('major')->nullable();
            $table->string('address');
            $table->string('phone_number', 11);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
    /**
     * Reverse the migrations.
     */
};
