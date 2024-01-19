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
        Schema::create('aboutmes', function (Blueprint $table) {
            $table->id();
            $table->json('section_title');
            $table->json('name');
            $table->json('description');
            $table->string('download_cv');
            $table->json('info'); // inside info json [name,age,spoken_langages,nationality,interest,years_of_experience]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutmes');
    }
};
