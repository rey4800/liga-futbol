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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('torneo_id');
            $table->string('titular');
            $table->string('direccion');
            $table->unsignedBigInteger('equipo_local_id');
            $table->unsignedBigInteger('equipo_visitante_id');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('estado_id');
            $table->integer('goles_local')->nullable()->default(0);
            $table->integer('goles_visitante')->nullable()->default(0);
            $table->foreign('equipo_local_id')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('equipo_visitante_id')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('torneo_id')->references('id')->on('torneos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
