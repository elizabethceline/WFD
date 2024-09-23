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
        Schema::create('study_plans', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('students')->OnDelete('cascade');
            $table->foreignId('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->OnDelete('cascade');
            $table->string('period',6);
            $table->boolean('is_cancel')->default(false);
            $table->float('grade')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_plans');
    }
};
