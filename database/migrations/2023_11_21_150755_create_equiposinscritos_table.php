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
        Schema::create('equiposinscritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('torneo_id');
            $table->unsignedBigInteger('equipo_id')->unique();
            $table->integer('partidos_ganados')->nullable()->default(0);
            $table->integer('partidos_empatados')->nullable()->default(0);
            $table->integer('partidos_perdidos')->nullable()->default(0);
            $table->integer('goles_favor')->nullable()->default(0);
            $table->integer('goles_contra')->nullable()->default(0);
            $table->integer('diferencia')->nullable()->default(0);
            $table->integer('puntos')->nullable()->default(0);
            $table->foreign('torneo_id')->references('id')->on('torneos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equiposinscritos');
    }
};
