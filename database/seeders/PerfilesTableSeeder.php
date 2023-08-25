<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perfiles')->insert([
            ['nombreperfil' => 'Gerente de Contabilidad'],
            ['nombreperfil' => 'Jefe de Cobranza'],
            ['nombreperfil' => 'Practicante de Cobranza'],
            ['nombreperfil' => 'Invitado'],
        ]);
    }
}
