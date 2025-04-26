<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('besoins', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->string('entreprise', 255)->nullable();
            $table->string('email', 255);
            $table->string('telephone', 20)->nullable();
            $table->text('projet');
            $table->string('budget', 100)->nullable();
            $table->string('delai', 100)->nullable();
            $table->text('details')->nullable();
            $table->json('services');
            $table->timestamps();
            
            $table->index('email'); // Index pour les recherches
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('besoins');
    }
};