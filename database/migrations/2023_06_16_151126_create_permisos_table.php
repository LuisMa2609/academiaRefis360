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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->string('permiso');
        });

        Schema::table('seccionespermisos', function (Blueprint $table){
            $table->unsignedBigInteger('permisos_id')->after('id');
            $table->foreign('permisos_id')->references('id')->on('permisos');
        });

        Schema::table('usuariopermisos', function (Blueprint $table){
            $table->unsignedBigInteger('permisos_id')->after('id');
            $table->foreign('permisos_id')->references('id')->on('permisos');
        });

        Schema::table('relacionguias', function (Blueprint $table){
            $table->unsignedBigInteger('permisos_id')->after('id');
            $table->foreign('permisos_id')->references('id')->on('permisos');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
