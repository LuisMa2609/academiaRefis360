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
        Schema::create('guias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('urlvideo')->unique();
            $table->string('urlpdf')->unique();
            $table->timestamps();
        });

        Schema::table('relacionguias', function (Blueprint $table){
            $table->unsignedBigInteger('guia_id')->after('id');
            $table->foreign('guia_id')->references('id')->on('guias');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guias');
    }
};
