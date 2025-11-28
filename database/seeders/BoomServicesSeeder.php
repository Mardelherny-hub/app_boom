<?php

namespace Database\Seeders;

use App\Domain\Services\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BoomServicesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Branding',
                'description' => "Identidad visual\nLogo y manual\nEstrategia de marca",
                'order' => 1,
            ],
            [
                'title' => 'Web + Digital',
                'description' => "Sitios web\nE-commerce\nDesarrollo web",
                'order' => 2,
            ],
            [
                'title' => 'Editorial',
                'description' => "Catálogos\nRevistas\nMaterial impreso",
                'order' => 3,
            ],
            [
                'title' => 'Packaging',
                'description' => "Diseño de envases\nEtiquetas\nPresentación producto",
                'order' => 4,
            ],
            [
                'title' => 'Redes Sociales',
                'description' => "Community\nContenido\nEstrategia digital",
                'order' => 5,
            ],
            [
                'title' => 'Video',
                'description' => "Motion graphics\nSpots publicitarios\nContenido audiovisual",
                'order' => 6,
            ],
            [
                'title' => 'Fotografía',
                'description' => "Fotografía producto\nCorporativa\nEventos",
                'order' => 7,
            ],
            [
                'title' => 'Ilustración',
                'description' => "Ilustración digital\nPersonajes\nArte conceptual",
                'order' => 8,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => Str::slug($service['title'])],
                [
                    'uuid' => Str::uuid(),
                    'title' => $service['title'],
                    'slug' => Str::slug($service['title']),
                    'description' => $service['description'],
                    'content' => '<p>' . nl2br(e($service['description'])) . '</p>',
                    'featured' => true,
                    'order' => $service['order'],
                    'published_at' => now(),
                ]
            );
        }

        $this->command->info('✓ 8 servicios Boom creados/actualizados');
    }
}