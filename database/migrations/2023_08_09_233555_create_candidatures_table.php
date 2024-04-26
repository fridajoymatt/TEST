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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            // $table->text('motivation');


            $table->string('nom');
            $table->string('prenom');
            $table->date('dateNaissance');
            $table->string('lieuNaissance');
            $table->string('sexe');
            $table->string('nationnalite');
            $table->string('email');
            $table->string('numeroTel1');
            $table->string('indicatif1');
            $table->string('indicatif2')->nullable();
            $table->string('numeroTel2')->nullable();
            $table->string('adresse');
            $table->string('niveau');
            $table->string('paysResidence');
            $table->string('statut_emp');
            $table->string('link')->unique();



            // $table->foreignId('formation_id')->references('id')->on('formations');
            $table->foreignId('offre_id')->references('id')->on('offres');
            // $table->foreignId('experience_id')->references('id')->on('experiences');
            // $table->foreignId('langue_id')->references('id')->on('langues');

            $table->integer('experience');

            // $table->string('langue_francais');
            // $table->string('langue_anglais');



            $table->string('cv');
            $table->string('piece');
            $table->string('type_piece');
            $table->string('nationnalite_doc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
