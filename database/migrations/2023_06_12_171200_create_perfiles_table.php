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
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->string('nombreperfil');
        });

        Schema::table('perfil_secciones_permisos', function (Blueprint $table){
            $table->unsignedBigInteger('perfil_id')->after('id');
            $table->foreign('perfil_id')->references('id')->on('perfiles');
        });

        Schema::table('relacionguias', function (Blueprint $table){
            $table->unsignedBigInteger('perfil_id')->after('id');
            $table->foreign('perfil_id')->references('id')->on('perfiles');
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
