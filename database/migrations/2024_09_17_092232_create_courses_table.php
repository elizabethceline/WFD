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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->string('course_code',6)->unique();
            $table->year('year');
            $table->string('course_name');
            $table->string('course_name_en');
            $table->tinyInteger('sks');
            $table->foreignId('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->OnDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
