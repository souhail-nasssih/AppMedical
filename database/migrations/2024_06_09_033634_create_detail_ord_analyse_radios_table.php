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
        Schema::create('detail_ord_analyse_radios', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type');
            $table->string('detail');
            $table->unsignedBigInteger('ordAnalyseRadio_id'); // Utilisez unsignedBigInteger pour correspondre à l'id de ord_analyse_radios
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('ordAnalyseRadio_id')
                ->references('id')
                ->on('ord_analyse_radios')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_ord_analyse_radios');
    }
};
