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
        Schema::create('education_and_skills', function (Blueprint $table) {
            $table->id();
            $table->json('section_title');
            $table->json('skills');// inside json [title,date,education_title,educationName]
            $table->json('educations');// inside json [title,date,job_title,compnayName]
            $table->json('skill_and_tools');// inside json [title,percentage]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_and_skills');
    }
};
