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
        Schema::create('perfessional_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumnis')->onDelete('cascade');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('present_position');
            $table->string('monthly_income');
            $table->string('emplyment_status');
            $table->year('inclusive_from');
            $table->year('inclusive_to');
            $table->unsignedTinyInteger('age');
            $table->string('civil_status');
            $table->string('grad_course');
            $table->string('Major')->nullable();
            $table->string('adress');
            $table->string('phone_number', 11);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_data');
    }
};
