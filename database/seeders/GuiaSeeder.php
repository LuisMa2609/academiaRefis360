<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guias = [
            [
                'nombre' => 'Guía de Introducción al Jardín Vertical',
                'descripcion' => 'Aprende a crear y mantener impresionantes jardines verticales en espacios reducidos.',
                'urlvideo' => 'https://www.ejemplo.com/guia-jardin-vertical/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-jardin-vertical/pdf',
            ],
            [
                'nombre' => 'Guía de Fotografía Nocturna para Principiantes',
                'descripcion' => 'Descubre los secretos para capturar imágenes sorprendentes en entornos de poca luz.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-nocturna/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-nocturna/pdf',
            ],
            [
                'nombre' => 'Guía de Cocina Mediterránea Paso a Paso',
                'descripcion' => 'Aprende a cocinar deliciosos platillos mediterráneos con esta guía llena de recetas y técnicas.',
                'urlvideo' => 'https://www.ejemplo.com/guia-cocina-mediterranea/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-cocina-mediterranea/pdf',
            ],
            [
                'nombre' => 'Guía de Yoga para Flexibilidad Total',
                'descripcion' => 'Mejora tu flexibilidad y bienestar general con esta guía de poses y rutinas de yoga.',
                'urlvideo' => 'https://www.ejemplo.com/guia-yoga-flexibilidad/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-yoga-flexibilidad/pdf',
            ],
            [
                'nombre' => 'Guía de Viaje para Mochileros en Asia',
                'descripcion' => 'Descubre los destinos más asombrosos y consejos útiles para viajar como mochilero por Asia.',
                'urlvideo' => 'https://www.ejemplo.com/guia-viaje-asia/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-viaje-asia/pdf',
            ],
            [
                'nombre' => 'Guía de Marketing Digital para Emprendedores',
                'descripcion' => 'Aprende estrategias efectivas de marketing digital para hacer crecer tu negocio en línea.',
                'urlvideo' => 'https://www.ejemplo.com/guia-marketing-digital/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-marketing-digital/pdf',
            ],
            [
                'nombre' => 'Guía de Reparación de Bicicletas DIY',
                'descripcion' => 'Domina las habilidades básicas de reparación de bicicletas y ahorra dinero en el taller.',
                'urlvideo' => 'https://www.ejemplo.com/guia-reparacion-bicicletas/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-reparacion-bicicletas/pdf',
            ],
            [
                'nombre' => 'Guía de Escritura Creativa para Principiantes',
                'descripcion' => 'Despierta tu creatividad y aprende técnicas para escribir relatos envolventes.',
                'urlvideo' => 'https://www.ejemplo.com/guia-escritura-creativa/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-escritura-creativa/pdf',
            ],
            [
                'nombre' => 'Guía de Primeros Auxilios en el Hogar',
                'descripcion' => 'Conoce las prácticas de primeros auxilios que podrían salvar vidas en situaciones de emergencia.',
                'urlvideo' => 'https://www.ejemplo.com/guia-primeros-auxilios/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-primeros-auxilios/pdf',
            ],
            [
                'nombre' => 'Guía de Decoración de Interiores DIY',
                'descripcion' => 'Transforma tu hogar con ideas creativas y consejos de diseño de interiores.',
                'urlvideo' => 'https://www.ejemplo.com/guia-decoracion-interiores/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-decoracion-interiores/pdf',
            ],
        ];

        foreach ($guias as $guia) {
            DB::table('guias')->insert([
                'nombre' => $guia['nombre'],
                'descripcion' => $guia['descripcion'],
                'urlvideo' => $guia['urlvideo'],
                'urlpdf' => $guia['urlpdf'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
