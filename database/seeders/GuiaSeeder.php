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
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Fotografía Nocturna para Principiantes',
                'descripcion' => 'Descubre los secretos para capturar imágenes sorprendentes en entornos de poca luz.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-nocturna/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-nocturna/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Cocina Mediterránea Paso a Paso',
                'descripcion' => 'Aprende a cocinar deliciosos platillos mediterráneos con esta guía llena de recetas y técnicas.',
                'urlvideo' => 'https://www.ejemplo.com/guia-cocina-mediterranea/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-cocina-mediterranea/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Yoga para Flexibilidad Total',
                'descripcion' => 'Mejora tu flexibilidad y bienestar general con esta guía de poses y rutinas de yoga.',
                'urlvideo' => 'https://www.ejemplo.com/guia-yoga-flexibilidad/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-yoga-flexibilidad/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Viaje para Mochileros en Asia',
                'descripcion' => 'Descubre los destinos más asombrosos y consejos útiles para viajar como mochilero por Asia.',
                'urlvideo' => 'https://www.ejemplo.com/guia-viaje-asia/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-viaje-asia/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Marketing Digital para Emprendedores',
                'descripcion' => 'Aprende estrategias efectivas de marketing digital para hacer crecer tu negocio en línea.',
                'urlvideo' => 'https://www.ejemplo.com/guia-marketing-digital/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-marketing-digital/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Reparación de Bicicletas DIY',
                'descripcion' => 'Domina las habilidades básicas de reparación de bicicletas y ahorra dinero en el taller.',
                'urlvideo' => 'https://www.ejemplo.com/guia-reparacion-bicicletas/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-reparacion-bicicletas/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Escritura Creativa para Principiantes',
                'descripcion' => 'Despierta tu creatividad y aprende técnicas para escribir relatos envolventes.',
                'urlvideo' => 'https://www.ejemplo.com/guia-escritura-creativa/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-escritura-creativa/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Primeros Auxilios en el Hogar',
                'descripcion' => 'Conoce las prácticas de primeros auxilios que podrían salvar vidas en situaciones de emergencia.',
                'urlvideo' => 'https://www.ejemplo.com/guia-primeros-auxilios/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-primeros-auxilios/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Decoración de Interiores DIY',
                'descripcion' => 'Transforma tu hogar con ideas creativas y consejos de diseño de interiores.',
                'urlvideo' => 'https://www.ejemplo.com/guia-decoracion-interiores/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-decoracion-interiores/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Fotografía de Paisajes en Blanco y Negro',
                'descripcion' => 'Domina la técnica de capturar la belleza de los paisajes en blanco y negro con esta guía especializada.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-paisajes-byn/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-paisajes-byn/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Entrenamiento en Casa sin Equipo',
                'descripcion' => 'Mantén tu rutina de ejercicios con esta guía que te enseñará a entrenar en casa sin necesidad de equipos costosos.',
                'urlvideo' => 'https://www.ejemplo.com/guia-entrenamiento-casa/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-entrenamiento-casa/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Cocina Vegana para Principiantes',
                'descripcion' => 'Descubre deliciosas recetas veganas y aprende a cocinar platillos sabrosos y saludables.',
                'urlvideo' => 'https://www.ejemplo.com/guia-cocina-vegana/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-cocina-vegana/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Inversiones en Criptomonedas',
                'descripcion' => 'Aprende los conceptos básicos para invertir en criptomonedas de manera segura y eficiente.',
                'urlvideo' => 'https://www.ejemplo.com/guia-inversion-criptomonedas/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-inversion-criptomonedas/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Meditación para Reducción del Estrés',
                'descripcion' => 'Explora técnicas de meditación que te ayudarán a reducir el estrés y encontrar la tranquilidad interior.',
                'urlvideo' => 'https://www.ejemplo.com/guia-meditacion-estres/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-meditacion-estres/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Fotografía de Alimentos para Redes Sociales',
                'descripcion' => 'Aprende a tomar fotografías atractivas de alimentos para compartir en redes sociales y captar la atención de tu audiencia.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-alimentos/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-alimentos/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Programación en Python para Principiantes',
                'descripcion' => 'Inicia tu viaje en la programación con Python, uno de los lenguajes más amigables para principiantes.',
                'urlvideo' => 'https://www.ejemplo.com/guia-programacion-python/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-programacion-python/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Crianza Positiva para Padres',
                'descripcion' => 'Aprende técnicas y enfoques de crianza positiva para fomentar un desarrollo saludable en tus hijos.',
                'urlvideo' => 'https://www.ejemplo.com/guia-crianza-positiva/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-crianza-positiva/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Fotografía de Retratos en Exteriores',
                'descripcion' => 'Descubre cómo tomar retratos impresionantes en entornos al aire libre y aprovecha la luz natural.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-retratos-exteriores/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-retratos-exteriores/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Aprendizaje de Idiomas para Viajeros',
                'descripcion' => 'Aprende estrategias efectivas para adquirir habilidades en un nuevo idioma antes de tu próximo viaje.',
                'urlvideo' => 'https://www.ejemplo.com/guia-aprendizaje-idiomas/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-aprendizaje-idiomas/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Fotografía de Aves en la Naturaleza',
                'descripcion' => 'Aprende técnicas avanzadas para capturar la belleza de las aves en su entorno natural.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-aves-naturaleza/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-aves-naturaleza/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Costura DIY para Principiantes',
                'descripcion' => 'Domina los fundamentos de la costura y crea tus propias prendas y proyectos de moda.',
                'urlvideo' => 'https://www.ejemplo.com/guia-costura-diy/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-costura-diy/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Marketing en Redes Sociales',
                'descripcion' => 'Aprende estrategias efectivas para promocionar tu negocio en plataformas de redes sociales.',
                'urlvideo' => 'https://www.ejemplo.com/guia-marketing-redes-sociales/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-marketing-redes-sociales/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Nutrición y Dietética',
                'descripcion' => 'Comprende los principios de una alimentación saludable y equilibrada para mejorar tu bienestar.',
                'urlvideo' => 'https://www.ejemplo.com/guia-nutricion-dietetica/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-nutricion-dietetica/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Photoshop para Retoque Fotográfico',
                'descripcion' => 'Aprende a utilizar Photoshop para retocar y mejorar tus fotos de manera profesional.',
                'urlvideo' => 'https://www.ejemplo.com/guia-photoshop-retoque-fotografico/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-photoshop-retoque-fotografico/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Inversiones en Bienes Raíces',
                'descripcion' => 'Descubre estrategias y consejos para invertir en propiedades y generar ingresos pasivos.',
                'urlvideo' => 'https://www.ejemplo.com/guia-inversion-bienes-raices/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-inversion-bienes-raices/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Escritura de Guiones para Cine y TV',
                'descripcion' => 'Aprende a escribir guiones cinematográficos y televisivos que cautiven al público.',
                'urlvideo' => 'https://www.ejemplo.com/guia-escritura-guiones/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-escritura-guiones/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Viaje para Aventureros en Patagonia',
                'descripcion' => 'Descubre los destinos más emocionantes y actividades extremas en la región de la Patagonia.',
                'urlvideo' => 'https://www.ejemplo.com/guia-viaje-patagonia/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-viaje-patagonia/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Fotografía Subacuática para Buceadores',
                'descripcion' => 'Aprende a capturar la vida marina y los paisajes submarinos con tu cámara bajo el agua.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-subacuatica/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-subacuatica/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Yoga para Aliviar el Dolor de Espalda',
                'descripcion' => 'Practica posturas de yoga diseñadas específicamente para reducir el dolor y mejorar la salud de la espalda.',
                'urlvideo' => 'https://www.ejemplo.com/guia-yoga-aliviar-dolor-espalda/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-yoga-aliviar-dolor-espalda/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Juegos de Mesa para Noches Divertidas',
                'descripcion' => 'Descubre juegos de mesa emocionantes para pasar noches inolvidables con amigos y familiares.',
                'urlvideo' => 'https://www.ejemplo.com/guia-juegos-mesa-divertidas/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-juegos-mesa-divertidas/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Marketing de Afiliados en Línea',
                'descripcion' => 'Aprende a ganar dinero promocionando productos y servicios como afiliado en línea.',
                'urlvideo' => 'https://www.ejemplo.com/guia-marketing-afiliados/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-marketing-afiliados/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Fotografía de Moda y Estilo',
                'descripcion' => 'Captura la esencia de la moda y el estilo en tus fotografías con esta guía especializada.',
                'urlvideo' => 'https://www.ejemplo.com/guia-fotografia-moda-estilo/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-fotografia-moda-estilo/pdf',
                'status' => '1',
            ],
            [
                'nombre' => 'Guía de Aprendizaje de Piano para Principiantes',
                'descripcion' => 'Inicia tu viaje musical y aprende a tocar el piano desde cero con esta guía práctica.',
                'urlvideo' => 'https://www.ejemplo.com/guia-aprendizaje-piano/video',
                'urlpdf' => 'https://www.ejemplo.com/guia-aprendizaje-piano/pdf',
                'status' => '1',
            ],
        ];

        foreach ($guias as $guia) {
            DB::table('guias')->insert([
                'nombre' => $guia['nombre'],
                'descripcion' => $guia['descripcion'],
                'urlvideo' => $guia['urlvideo'],
                'urlpdf' => $guia['urlpdf'],
                'status' => $guia['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
