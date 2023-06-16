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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombreseccion');
        });

        Schema::table('perfilsecciones', function (Blueprint $table){
            $table->unsignedBigInteger('secciones_id')->after('id');
            $table->foreign('secciones_id')->references('id')->on('secciones');
        });

        Schema::table('seccionespermisos', function (Blueprint $table){
            $table->unsignedBigInteger('secciones_id')->after('id');
            $table->foreign('secciones_id')->references('id')->on('secciones');
        });

        Schema::table('relacionguias', function (Blueprint $table){
            $table->unsignedBigInteger('seccion_id')->after('id');
            $table->foreign('seccion_id')->references('id')->on('secciones');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secciones');
    }
};
