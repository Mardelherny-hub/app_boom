<?php

namespace Database\Seeders\Domain;

use App\Domain\Services\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'uuid' => Str::uuid()->toString(),
                'title' => 'Web Development',
                'slug' => Str::slug('Web Development'),
                'description' => 'Custom web development solutions tailored to your business needs.',
                'content' => '<p>We create modern, responsive websites using the latest technologies.</p>',
                'featured' => true,
                'order' => 1,
                'published_at' => now(),
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'title' => 'Mobile App Development',
                'slug' => Str::slug('Mobile App Development'),
                'description' => 'Native and cross-platform mobile applications.',
                'content' => '<p>Build engaging mobile experiences for iOS and Android.</p>',
                'featured' => true,
                'order' => 2,
                'published_at' => now(),
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'title' => 'UI/UX Design',
                'slug' => Str::slug('UI/UX Design'),
                'description' => 'Beautiful and intuitive user interface design.',
                'content' => '<p>Create stunning designs that users love.</p>',
                'featured' => false,
                'order' => 3,
                'published_at' => now(),
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Services created successfully!');
    }
}