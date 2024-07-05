<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->String('email', 30)->primary();
            $table->String('password', 60);
            $table->String('nombre', 40);
            //$table->String('activo')->default();
            $table->unsignedBigInteger('perfil_id');
            $table->foreign('perfil_id')->references('id')->on('perfiles');

            $table->softDeletes();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
