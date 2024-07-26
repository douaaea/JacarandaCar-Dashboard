<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id('idVoiture');
            $table->string('model');
            $table->smallInteger('numPassagers');
            $table->float('prixJour');
            $table->string('matricule')->unique();
            $table->string('couleur');
            $table->string('carburant');
            $table->string('boiteVitesse');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
