<?php

namespace App\Support\SEO\Schema;

use App\Domain\Blog\Models\Post;

class ArticleSchema extends SchemaBuilder
{
    public function __construct(
        protected Post $post
    ) {}

    protected function getType(): string
    {
        return 'Article';
    }

    public function build(): array
    {
        $author = $this->post->author;
        
        $data = [
            'headline' => $this->post->title,
            'description' => $this->post->excerpt,
            'datePublished' => $this->post->published_at?->toIso8601String(),
            'dateModified' => $this->post->updated_at->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => $author->name,
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('app.name'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => url('/images/logo.png'), // Ajustar según tu logo
                ],
            ],
        ];

        // Featured image
        if ($featuredImage = $this->post->getFirstMediaUrl('featured_image')) {
            $data['image'] = url($featuredImage);
        }

        // Category
        if ($this->post->category) {
            $data['articleSection'] = $this->post->category->name;
        }

        // Reading time
        if ($this->post->reading_time) {
            $data['timeRequired'] = "PT{$this->post->reading_time}M";
        }

        // Word count
        $data['wordCount'] = str_word_count(strip_tags($this->post->content));

        return $data;
    }
}