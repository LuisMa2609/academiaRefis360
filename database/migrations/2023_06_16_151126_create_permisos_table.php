<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->string('permiso');
        });

        Schema::table('perfil_secciones_permisos', function (Blueprint $table){
            $table->unsignedBigInteger('permiso_id')->after('id');
            $table->foreign('permiso_id')->references('id')->on('permisos');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
