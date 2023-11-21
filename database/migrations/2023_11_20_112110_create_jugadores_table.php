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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('edad');
            $table->unsignedBigInteger('genero_id');
            $table->string('dni')->nullable();
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('posicion_id');
            $table->integer('numero_jugador');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('imagen');
            $table->string('nombre_responsable')->nullable();
            $table->string('dni_responsable')->nullable();
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('posicion_id')->references('id')->on('posiciones')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
