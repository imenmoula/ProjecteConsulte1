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
        Schema::create('rendivents', function (Blueprint $table) {
         $table->id();
        $table->unsignedBigInteger('user_id'); // Clé étrangère vers la table users
        $table->string('title'); // Exemple : titre du rendez-vous
        $table->text('sujet')->nullable();
        $table->dateTime('timedate');
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendivents');
    }
};
