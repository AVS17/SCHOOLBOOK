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
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentID');
            $table->string('student_name', 50);
            $table->string('paternal_surname', 50);
            $table->string('maternal_surname', 50);
            $table->integer('grade');
            $table->date('birth_date');
            $table->string('curp', 18);
            $table->string('gender', 10);
            $table->string('email', 50);
            $table->string('phone');
            $table->boolean('status');
            $table->string('study_plan', 100);
            $table->string('photo', 255);
            $table->string('address_id');
            $table->string('tutor_id');
            $table->string('document_id');
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
