<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perfil;
use App\Models\Seccion;
use App\Models\Permiso;
use Illuminate\Support\Facades\DB;


class PerfilSeccionPermisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [null, 1, 1, 1, 1],
            [null, 2, 1, 1, 1],
            [null, 3, 1, 1, 1],
            [null, 1, 1, 1, 1],
            [null, 2, 1, 1, 1],
            [null, 3, 1, 1, 1],
            [null, 1, 2, 1, 1],
            [null, 2, 2, 1, 1],
            [null, 3, 2, 1, 1],
            [null, 1, 3, 1, 1],
            [null, 2, 3, 1, 1],
            [null, 3, 3, 1, 1],
            [null, 1, 1, 2, 1],
            [null, 2, 1, 2, 1],
            [null, 3, 1, 2, 1],
            [null, 1, 2, 2, 1],
            [null, 2, 2, 2, 1],
            [null, 3, 2, 2, 1],
            [null, 1, 3, 2, 1],
            [null, 2, 3, 2, 1],
            [null, 3, 3, 2, 1],
            [null, 1, 1, 3, 1],
            [null, 2, 1, 3, 1],
            [null, 3, 1, 3, 1],
            [null, 1, 2, 3, 1],
            [null, 2, 2, 3, 1],
            [null, 3, 2, 3, 1],
            [null, 1, 3, 3, 1],
            [null, 2, 3, 3, 1],
            [null, 3, 3, 3, 1],
            [null, 1, 1, 4, 1],
            [null, 2, 1, 4, 1],
            [null, 3, 1, 4, 1],
            [null, 1, 2, 4, 1],
            [null, 2, 2, 4, 1],
            [null, 3, 2, 4, 1],
            [null, 1, 3, 4, 1],
            [null, 2, 3, 4, 1],
            [null, 3, 3, 4, 1],
        ];

        // Insertar los datos en la tabla pivote
        DB::table('perfil_secciones_permisos')->insert($data);
    }
}
