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
    Schema::create('professional_data', function (Blueprint $table) {
        $table->id();
        $table->foreignId('alumni_id')->constrained('personal_data');
        $table->string('company_name');
        $table->text('company_address');
        $table->string('employer');
        $table->text('employer_address');
        $table->foreignId('employment_status_id')->constrained('employment_statuses');
        $table->string('present_position');
        $table->year('inclusive_from');
        $table->year('inclusive_to');
        $table->foreignId('monthly_income_id')->constrained('monthly_incomes');
        $table->json('skills_used');
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
