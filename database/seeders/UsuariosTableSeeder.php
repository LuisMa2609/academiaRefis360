<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::tabble('users')->insert([
            'name' => 'Admin',
            'surname' => 'AdminSurname',
            'email' => 'CorreoAdmin@hotmail.com',
            'celular' => '1234567890',
            'password' => Hash::make('123456789'),
            'puesto' => 'Director',
            'status' => '1',
            'rol' => '1',
            'email_verified_at' => null,
            'remember_token' =>null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
