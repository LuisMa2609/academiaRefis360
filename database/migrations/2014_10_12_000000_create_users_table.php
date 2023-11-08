<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('celular')->unique();
            $table->string('password');
            $table->string('puesto');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('rol')->default(0);;
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('perfiles_users', function (Blueprint $table){
            $table->unsignedBigInteger('usuario_id')->after('id');
            $table->foreign('usuario_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
