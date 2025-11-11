<?php

namespace App\Support\SEO;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class SEOManager
{
    protected array $data = [];
    protected array $openGraph = [];
    protected array $twitter = [];
    protected ?string $schema = null;

    public function __construct()
    {
        // Defaults desde settings
        $this->data = [
            'title' => settings('site_name', config('app.name')),
            'description' => settings('meta_description_default', 'Modern web agency'),
            'keywords' => [],
            'image' => null,
            'url' => url()->current(),
            'canonical' => url()->current(),
            'robots' => 'index,follow',
        ];
    }

    /**
     * Set page title
     */
    public function title(string $title, bool $appendSiteName = true): self
    {
        $this->data['title'] = $appendSiteName 
            ? $title . ' | ' . config('app.name')
            : $title;
        
        return $this;
    }

    /**
     * Set meta description
     */
    public function description(string $description): self
    {
        $this->data['description'] = Str::limit($description, 160);
        return $this;
    }

    /**
     * Set keywords
     */
    public function keywords(array|string $keywords): self
    {
        $this->data['keywords'] = is_array($keywords) 
            ? $keywords 
            : explode(',', $keywords);
        
        return $this;
    }

    /**
     * Set featured image
     */
    public function image(?string $imageUrl): self
    {
        $this->data['image'] = $imageUrl ? url($imageUrl) : null;
        return $this;
    }

    /**
     * Set canonical URL
     */
    public function canonical(string $url): self
    {
        $this->data['canonical'] = $url;
        return $this;
    }

    /**
     * Set robots directive
     */
    public function robots(string $robots): self
    {
        $this->data['robots'] = $robots;
        return $this;
    }

    /**
     * Noindex, nofollow
     */
    public function noindex(): self
    {
        return $this->robots('noindex,nofollow');
    }

    /**
     * Open Graph data
     */
    public function openGraph(array $data): self
    {
        $this->openGraph = array_merge($this->openGraph, $data);
        return $this;
    }

    /**
     * Twitter Card data
     */
    public function twitter(array $data): self
    {
        $this->twitter = array_merge($this->twitter, $data);
        return $this;
    }

    /**
     * Set schema.org markup
     */
    public function schema(string $schema): self
    {
        $this->schema = $schema;
        return $this;
    }

    /**
     * Get all SEO data
     */
    public function get(): array
    {
        return [
            'meta' => $this->data,
            'openGraph' => $this->getOpenGraphData(),
            'twitter' => $this->getTwitterData(),
            'schema' => $this->schema,
        ];
    }

    /**
     * Generate Open Graph tags
     */
    protected function getOpenGraphData(): array
    {
        $defaults = [
            'og:title' => $this->data['title'],
            'og:description' => $this->data['description'],
            'og:url' => $this->data['url'],
            'og:type' => 'website',
            'og:site_name' => config('app.name'),
        ];

        if ($this->data['image']) {
            $defaults['og:image'] = $this->data['image'];
            $defaults['og:image:width'] = '1200';
            $defaults['og:image:height'] = '630';
        }

        return array_merge($defaults, $this->openGraph);
    }

    /**
     * Generate Twitter Card tags
     */
    protected function getTwitterData(): array
    {
        $defaults = [
            'twitter:card' => 'summary_large_image',
            'twitter:title' => $this->data['title'],
            'twitter:description' => $this->data['description'],
        ];

        if ($this->data['image']) {
            $defaults['twitter:image'] = $this->data['image'];
        }

        return array_merge($defaults, $this->twitter);
    }

    /**
     * Render SEO tags
     */
    public function render(): string
    {
        return view('components.seo.meta-tags', $this->get())->render();
    }
}