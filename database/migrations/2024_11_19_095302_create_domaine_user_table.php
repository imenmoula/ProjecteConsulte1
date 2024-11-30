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
        Schema::create('domaine_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lien vers l'utilisateur
            $table->foreignId('domaine_id')->constrained()->onDelete('cascade'); // Lien vers le domaine
            $table->string('certification')->nullable(); // Certification optionnelle liée au domaine
            $table->text('profile')->nullable(); // Profil détaillé de l'expert
            $table->boolean('availability')->default(true); // Disponibilité (true = disponible)
            $table->text('professional_experience')->nullable(); // Expérience professionnelle
            $table->string('photo')->nullable(); // Chemin vers la photo de l'expert
            $table->string('tel'); // Numéro de téléphone
            $table->string('adresse'); // Adresse de l'expert

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domaine_user');
    }
};
