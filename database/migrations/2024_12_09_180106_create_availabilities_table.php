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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id(); // ID auto-incrémenté pour chaque disponibilité
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère pour l'utilisateur
            $table->dateTime('start_time'); // Heure de début de la disponibilité
            $table->dateTime('end_time'); // Heure de fin de la disponibilité
            $table->enum('status', ['disponible', 'reserver', 'indisponible'])->default('disponible'); // Statut de la disponibilité
            $table->timestamps(); // Created at et updated at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
