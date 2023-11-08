<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('secciones')->insert([
            ['nombreseccion' => 'Notificacion de pago'],
            ['nombreseccion' => 'Transacciones'],
            ['nombreseccion' => 'Estado  de cuenta'],
        ]);
    }
}
