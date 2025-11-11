<?php

namespace App\Http\Controllers;

use App\Domain\Blog\Models\Post;
use App\Domain\Portfolio\Models\Project;
use App\Domain\Services\Models\Service;
use App\Domain\Pages\Models\Page;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate sitemap.xml
     */
    public function index(): Response
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Homepage
        $sitemap .= $this->addUrl(route('home'), now(), '1.0', 'daily');

        // Services
        $sitemap .= $this->addUrl(route('services.index'), now(), '0.9', 'weekly');
        
        Service::published()->get()->each(function ($service) use (&$sitemap) {
            $sitemap .= $this->addUrl(
                route('services.show', $service->slug),
                $service->updated_at,
                '0.8',
                'monthly'
            );
        });

        // Portfolio
        $sitemap .= $this->addUrl(route('portfolio.index'), now(), '0.9', 'weekly');
        
        Project::published()->get()->each(function ($project) use (&$sitemap) {
            $sitemap .= $this->addUrl(
                route('portfolio.show', $project->slug),
                $project->updated_at,
                '0.7',
                'monthly'
            );
        });

        // Blog
        $sitemap .= $this->addUrl(route('blog.index'), now(), '0.9', 'daily');
        
        Post::published()->get()->each(function ($post) use (&$sitemap) {
            $sitemap .= $this->addUrl(
                route('blog.show', $post->slug),
                $post->updated_at,
                '0.8',
                'weekly'
            );
        });

        // Dynamic Pages
        Page::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->get()
            ->each(function ($page) use (&$sitemap) {
                $sitemap .= $this->addUrl(
                    route('pages.show', $page->slug),
                    $page->updated_at,
                    '0.7',
                    'monthly'
                );
            });

        // Contact
        $sitemap .= $this->addUrl(route('contact'), now(), '0.6', 'monthly');

        $sitemap .= '</urlset>';

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    /**
     * Add URL to sitemap
     */
    protected function addUrl(
        string $loc,
        $lastmod = null,
        string $priority = '0.5',
        string $changefreq = 'monthly'
    ): string {
        $url = '  <url>' . PHP_EOL;
        $url .= "    <loc>{$loc}</loc>" . PHP_EOL;
        
        if ($lastmod) {
            $date = $lastmod instanceof \Carbon\Carbon 
                ? $lastmod->toAtomString() 
                : $lastmod;
            $url .= "    <lastmod>{$date}</lastmod>" . PHP_EOL;
        }
        
        $url .= "    <changefreq>{$changefreq}</changefreq>" . PHP_EOL;
        $url .= "    <priority>{$priority}</priority>" . PHP_EOL;
        $url .= '  </url>' . PHP_EOL;

        return $url;
    }
}