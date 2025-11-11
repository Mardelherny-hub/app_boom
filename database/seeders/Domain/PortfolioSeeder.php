<?php

namespace Database\Seeders\Domain;

use App\Domain\Portfolio\Models\Project;
use App\Domain\Portfolio\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $webCategory = ProjectCategory::create([
            'name' => 'Web Development',
            'slug' => Str::slug('Web Development'),
            'description' => 'Web development projects',
            'order' => 1,
        ]);

        $mobileCategory = ProjectCategory::create([
            'name' => 'Mobile Apps',
            'slug' => Str::slug('Mobile Apps'),
            'description' => 'Mobile application projects',
            'order' => 2,
        ]);

        // Create projects
        $projects = [
            [
                'uuid' => Str::uuid()->toString(),
                'category_id' => $webCategory->id,
                'title' => 'E-commerce Platform',
                'slug' => Str::slug('E-commerce Platform'),
                'description' => 'Full-featured e-commerce solution',
                'content' => '<p>Built a complete e-commerce platform with payment integration.</p>',
                'client' => 'ABC Company',
                'project_date' => now()->subMonths(3),
                'featured' => true,
                'published_at' => now(),
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'category_id' => $mobileCategory->id,
                'title' => 'Fitness Tracker App',
                'slug' => Str::slug('Fitness Tracker App'),
                'description' => 'Mobile app for fitness tracking',
                'content' => '<p>Developed a cross-platform fitness tracking application.</p>',
                'client' => 'FitLife Inc',
                'project_date' => now()->subMonths(2),
                'featured' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $this->command->info('Portfolio created successfully!');
    }
}