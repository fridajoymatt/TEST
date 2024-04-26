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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('link');
            $table->string('etablissement');
            $table->string('document');
            $table->string('annee_diplome')->nullable(true);
            $table->foreignId('domaine_id')->references('id')->on('domaines');
            $table->foreignId('pays_id')->references('id')->on('pays');
            // $table->foreignId('candidature_id')->references('id')->on('candidatures');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
