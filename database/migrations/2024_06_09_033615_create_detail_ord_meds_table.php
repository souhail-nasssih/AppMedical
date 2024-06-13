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
        Schema::create('detail_ord_meds', function (Blueprint $table) {
            $table->id();
            $table->string('nom_medicament')->nullable();
            $table->string('utilisation');
            $table->string('periode');
            $table->string('remarque');
            $table->unsignedBigInteger('ordMedicament_id'); // Utilisez unsignedBigInteger pour correspondre à l'id de ord_medicaments
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('ordMedicament_id')
                ->references('id')
                ->on('ord_medicaments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_ord_meds');
    }
};
