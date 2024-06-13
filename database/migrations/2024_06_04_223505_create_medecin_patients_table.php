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
        Schema::create('medecin_patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medecin_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->timestamps();
            $table->unique(['medecin_id', 'patient_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medecin_patients');
    }
};
