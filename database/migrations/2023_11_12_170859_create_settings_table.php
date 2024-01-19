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
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("favicon")->nullable();
            $table->json("site_name")->nullable();
            $table->json("seo")->nullable();
            $table->json("social_links")->nullable();
            $table->json("color")->nullable();
            
            $table->json('meta_title')->nullable();
            $table->string('meta_image')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();
        
            $table->boolean("maintenance")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
