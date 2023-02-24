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
        Schema::create('level_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('capacity');
            $table->unsignedBigInteger('level-id');
            $table->foreign('level-id')->references('id')->on('levels')->onDelete('cascade');
            $table->unsignedBigInteger('section-id');
            $table->foreign('section-id')->references('id')->on('sections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_sections');
    }
};
