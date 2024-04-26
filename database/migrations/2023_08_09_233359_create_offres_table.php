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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->unique();
            $table->string('reference')->unique();
            $table->string('experience');
            // $table->string('experience_mois')->default(0);
            $table->longText('resume');
            $table->longText('details');
            $table->string('pdfFile')->default('null');
            $table->date('date_limite');
            $table->time('heure_limite');

            $table->string('statut')->default('Actif');

            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('age_id')->references('id')->on('ages');
            // $table->foreignId('region_id')->references('id')->on('regions');
            $table->foreignId('niveau_etudes_id')->references('id')->on('niveau_etudes');
            $table->foreignId('domaine_id')->references('id')->on('domaines');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
