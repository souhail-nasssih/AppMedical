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
        Schema::create('analyse_radios', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('type')->nullable();
            $table->date('date')->nullable();
            $table->string('resultat')->nullable();
            $table->text('rapport')->nullable();
            $table->foreignId('laboratoire_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyse_radios');
    }
};
