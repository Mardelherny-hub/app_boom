<?php

namespace Database\Seeders\Domain;

use App\Domain\Blog\Models\Post;
use App\Domain\Blog\Models\PostCategory;
use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Get first user as author
        $author = User::first();

        // Create categories
        $techCategory = PostCategory::create([
            'name' => 'Technology',
            'slug' => Str::slug('Technology'),
            'description' => 'Technology related posts',
            'order' => 1,
        ]);

        $designCategory = PostCategory::create([
            'name' => 'Design',
            'slug' => Str::slug('Design'),
            'description' => 'Design related posts',
            'order' => 2,
        ]);

        // Create posts
        $posts = [
            [
                'uuid' => Str::uuid()->toString(),
                'user_id' => $author->id,
                'category_id' => $techCategory->id,
                'title' => 'Getting Started with Laravel 12',
                'slug' => Str::slug('Getting Started with Laravel 12'),
                'excerpt' => 'Learn the basics of Laravel 12 framework.',
                'content' => '<p>Laravel 12 brings exciting new features...</p>',
                'featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'user_id' => $author->id,
                'category_id' => $designCategory->id,
                'title' => 'Modern UI Design Trends',
                'slug' => Str::slug('Modern UI Design Trends'),
                'excerpt' => 'Explore the latest trends in UI design.',
                'content' => '<p>UI design is constantly evolving...</p>',
                'featured' => false,
                'published_at' => now()->subDays(3),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        $this->command->info('Blog posts created successfully!');
    }
}