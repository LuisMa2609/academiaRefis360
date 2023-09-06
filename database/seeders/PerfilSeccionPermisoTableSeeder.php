<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilSeccionPermisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [null, 1, 1, 1, 1],
            [null, 2, 1, 1, 0],
            [null, 3, 1, 1, 0],
            [null, 1, 1, 1, 1],
            [null, 2, 1, 1, 0],
            [null, 3, 1, 1, 0],
            [null, 1, 2, 1, 1],
            [null, 2, 2, 1, 0],
            [null, 3, 2, 1, 0],
            [null, 1, 3, 1, 1],
            [null, 2, 3, 1, 0],
            [null, 3, 3, 1, 0],
            [null, 1, 1, 2, 1],
            [null, 2, 1, 2, 0],
            [null, 3, 1, 2, 0],
            [null, 1, 2, 2, 1],
            [null, 2, 2, 2, 0],
            [null, 3, 2, 2, 0],
            [null, 1, 3, 2, 1],
            [null, 2, 3, 2, 0],
            [null, 3, 3, 2, 0],
            [null, 1, 1, 3, 1],
            [null, 2, 1, 3, 0],
            [null, 3, 1, 3, 0],
            [null, 1, 2, 3, 1],
            [null, 2, 2, 3, 0],
            [null, 3, 2, 3, 0],
            [null, 1, 3, 3, 1],
            [null, 2, 3, 3, 0],
            [null, 3, 3, 3, 0],
            [null, 1, 1, 4, 1],
            [null, 2, 1, 4, 0],
            [null, 3, 1, 4, 0],
            [null, 1, 2, 4, 1],
            [null, 2, 2, 4, 0],
            [null, 3, 2, 4, 0],
            [null, 1, 3, 4, 1],
            [null, 2, 3, 4, 0],
            [null, 3, 3, 4, 0],
            // Agrega más registros aquí
        ];

        // Insertar los datos en la tabla pivote
        DB::table('perfil_secciones_permisos')->insert($data);
    }
}
