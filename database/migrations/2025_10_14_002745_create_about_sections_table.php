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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_type'); // history, mission, team, values, quality, innovation, partnerships, certifications
            $table->text('content')->nullable(); // For text content
            $table->json('data')->nullable(); // For structured data (team members, values, certifications, etc.)
            $table->string('image')->nullable(); // For team member images or certification files
            $table->integer('sort_order')->default(0); // For ordering
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Index for better performance
            $table->index('section_type');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
