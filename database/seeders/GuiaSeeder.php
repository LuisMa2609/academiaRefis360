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
            [
                'nombre' => 'Guía de Fotografía de Paisajes en Blanco y Negro',
                'descripcion' => 'Domina la técnica de capturar la belleza de los paisajes en blanco y negro con esta guía especializada.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-paisajes-byn/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-paisajes-byn/pdf',
            ],
            [
                'nombre' => 'Guía de Entrenamiento en Casa sin Equipo',
                'descripcion' => 'Mantén tu rutina de ejercicios con esta guía que te enseñará a entrenar en casa sin necesidad de equipos costosos.',
                'urlvideo' => 'https://www.ejemplo.com/guia-entrenamiento-casa/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-entrenamiento-casa/pdf',
            ],
            [
                'nombre' => 'Guía de Cocina Vegana para Principiantes',
                'descripcion' => 'Descubre deliciosas recetas veganas y aprende a cocinar platillos sabrosos y saludables.',
                'urlvideo' => 'https://www.ejemplo.com/guia-cocina-vegana/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-cocina-vegana/pdf',
            ],
            [
                'nombre' => 'Guía de Inversiones en Criptomonedas',
                'descripcion' => 'Aprende los conceptos básicos para invertir en criptomonedas de manera segura y eficiente.',
                'urlvideo' => 'https://www.ejemplo.com/guia-inversion-criptomonedas/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-inversion-criptomonedas/pdf',
            ],
            [
                'nombre' => 'Guía de Meditación para Reducción del Estrés',
                'descripcion' => 'Explora técnicas de meditación que te ayudarán a reducir el estrés y encontrar la tranquilidad interior.',
                'urlvideo' => 'https://www.ejemplo.com/guia-meditacion-estres/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-meditacion-estres/pdf',
            ],
            [
                'nombre' => 'Guía de Fotografía de Alimentos para Redes Sociales',
                'descripcion' => 'Aprende a tomar fotografías atractivas de alimentos para compartir en redes sociales y captar la atención de tu audiencia.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-alimentos/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-alimentos/pdf',
            ],
            [
                'nombre' => 'Guía de Programación en Python para Principiantes',
                'descripcion' => 'Inicia tu viaje en la programación con Python, uno de los lenguajes más amigables para principiantes.',
                'urlvideo' => 'https://www.ejemplo.com/guia-programacion-python/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-programacion-python/pdf',
            ],
            [
                'nombre' => 'Guía de Crianza Positiva para Padres',
                'descripcion' => 'Aprende técnicas y enfoques de crianza positiva para fomentar un desarrollo saludable en tus hijos.',
                'urlvideo' => 'https://www.ejemplo.com/guia-crianza-positiva/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-crianza-positiva/pdf',
            ],
            [
                'nombre' => 'Guía de Fotografía de Retratos en Exteriores',
                'descripcion' => 'Descubre cómo tomar retratos impresionantes en entornos al aire libre y aprovecha la luz natural.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-retratos-exteriores/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-retratos-exteriores/pdf',
            ],
            [
                'nombre' => 'Guía de Aprendizaje de Idiomas para Viajeros',
                'descripcion' => 'Aprende estrategias efectivas para adquirir habilidades en un nuevo idioma antes de tu próximo viaje.',
                'urlvideo' => 'https://www.ejemplo.com/guia-aprendizaje-idiomas/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-aprendizaje-idiomas/pdf',
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
