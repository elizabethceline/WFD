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
        Schema::create('students', function(Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->string('nrp',9)->unique();
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->text('address')->nullable();
            $table->string('phone_number');
            $table->boolean('is_active')->default(true);
            $table->string('NIK',16)->unique();
            $table->foreignId('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->OnDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
