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
        Schema::table('professional_data', function (Blueprint $table) {
            // Adding the 'skills' column after 'inclusive_to'
            $table->text('skills')->nullable()->after('inclusive_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('professional_data', function (Blueprint $table) {
            // Dropping the 'skills' column
            $table->dropColumn('skills');
        });
    }
};

