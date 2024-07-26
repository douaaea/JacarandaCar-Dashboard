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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('idClient');
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email', 50);
            $table->string('CIN', 10)->unique();
            $table->string('permis', 10)->unique();
            $table->smallInteger('age');
            $table->string('telephone', 15);
            $table->string('adresse', 50);
            $table->string('sexe', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
