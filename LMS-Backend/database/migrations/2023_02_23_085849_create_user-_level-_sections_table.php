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
        Schema::create('user-_level-_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('levelSection-id');
            $table->foreign('levelSection-id')->references('id')->on('level-_sections')->onDelete('cascade');
            
            $table->unsignedBigInteger('teacher-id');
            $table->foreign('teacher-id')->references('id')->on('user-_l_m_s')->onDelete('cascade');
            
            $table->unsignedBigInteger('student-id');
            $table->foreign('student-id')->references('id')->on('user-_l_m_s')->onDelete('cascade');
            
            $table->unsignedBigInteger('course-id');
            $table->foreign('course-id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user-_level-_sections');
    }
};
