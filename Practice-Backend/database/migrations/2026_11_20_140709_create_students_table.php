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
        $table->id();
        $table->foreignId('module_id')->constrained('modules')->cascadeOnDelete();
        $table->string('nombre');
        $table->string('apellidos');
        $table->date('fecha_nacimiento');
        $table->string('expediente')->unique();
        $table->string('foto_url')->nullable();
        $table->string('foto_public_id')->nullable();
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
