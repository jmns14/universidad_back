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
        Schema::create('asignatura_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estudiante_id')->unsigned();
            $table->bigInteger('asignatura_id')->unsigned();
            $table->timestamps();
            
            // Restricciones de integridad referencial
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');

            $table->unique(['asignatura_id', 'estudiante_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignatura_estudiantes');
    }
};
