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
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable(); 
            $table->string('phone')->nullable(); 
            $table->string('specialty')->nullable();
            $table->string('image')->nullable();
            $table->boolean('availability')->default(true);
            $table->integer('nb_experience')->nullable(); // Correction ici
            $table->foreignId('domaine_id')->constrained()->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experts');
    }
};
