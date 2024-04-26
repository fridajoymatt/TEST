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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('employeur');
            $table->string('fonction');
            $table->string('debut');
            $table->string('fin');
            $table->string('link');
            $table->longText('description');
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
        Schema::dropIfExists('experiences');
    }
};
