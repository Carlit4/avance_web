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
        Schema::create('arriendos', function (Blueprint $table) {

            $table->id();
            $table->String('rut_cliente', 10);
            $table->String('patente_vehiculo', 10);
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->date('fecha_termino');
            $table->time('hora_termino')->nullable();
            $table->String('imagen_entrega');
            $table->String('imagen_recepcion')->nullable();

            $table->foreign('rut_cliente')->references('rut')->on('clientes');
            $table->foreign('patente_vehiculo')->references('patente')->on('vehiculos');

            $table->softDeletes();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arriendos');
    }
};
