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
        Schema::create('professional_data_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professional_data_id');
            $table->unsignedBigInteger('skill_id');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('professional_data_id')->references('id')->on('professional_data')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('professional_data_skill');
    }

};
