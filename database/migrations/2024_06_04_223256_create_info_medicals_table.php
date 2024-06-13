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
        Schema::create('info_medicals', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable(); // Utilisation de ENUM pour limiter les valeurs possibles
            $table->string('nom')->nullable();
            $table->string('details')->nullable();
            $table->foreignId('patient_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_medicals');
    }
};
