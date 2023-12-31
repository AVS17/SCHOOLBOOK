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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacherID');
            $table->string('first_name', 50);
            $table->string('father_surname', 50);
            $table->string('fathers_last_name', 50);
            $table->string('phone');
            $table->string('email');
            $table->string('curp');
            $table->string('rfc', 50);
            $table->string('education_level', 50);
            $table->string('major', 50);
            $table->string('photo', 255);
            $table->string('professional_license', 255);
            $table->string('address_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
