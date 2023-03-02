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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('levelSection_id');
            $table->foreign('levelSection_id')->references('id')->on('level_sections')->onDelete('cascade');
            
<<<<<<< HEAD:LMS-Backend/database/migrations/2023_02_23_085833_create_attendances_table.php
            $table->unsignedBigInteger('studentId');
            $table->foreign('studentId')->references('id')->on('user_l_m_s')->onDelete('cascade'); 
=======
            $table->unsignedBigInteger('student_id')->unique();
            $table->foreign('student_id')->references('id')->on('user_l_m_s')->onDelete('cascade'); 
>>>>>>> origin/dev:LMS-Backend/database/migrations/2023_02_23_085833_create_attendaces_table.php

            $table->string('status');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendaces');
    }
};
