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
        Schema::create('asignatura_profesores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profesor_id')->unsigned();
            $table->bigInteger('asignatura_id')->unsigned();
            $table->timestamps();

            // Restricciones de integridad referencial
            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');

            $table->unique(['asignatura_id', 'profesor_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignatura_profesores');
    }
};
