<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Domain\Blog\Models\Post;
use App\Domain\Portfolio\Models\Project;
use App\Domain\Services\Models\Service;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Featured services - NO CAMBIOS (Service no tiene relaciones cargadas)
        $services = Service::published()
            ->featured()
            ->ordered()
            ->take(6)
            ->get();

        // Recent projects - OPTIMIZADO
        $projects = Project::published()
            ->with(['category:id,name,slug']) // Solo campos necesarios
            ->latest('published_at')
            ->take(6)
            ->get();

        // Recent blog posts - OPTIMIZADO
        $posts = Post::published()
            ->with([
                'author:id,name', // Solo ID y nombre del autor
                'category:id,name,slug'
            ])
            ->latest('published_at')
            ->take(3)
            ->get();

        seo()
            ->title(settings('seo_home_title', config('app.name')), false)
            ->description(settings('seo_home_description', ''))
            ->canonical(route('home'))
            ->schema((new \App\Support\SEO\Schema\OrganizationSchema())->toJson());

        return view('frontend.home', compact('services', 'projects', 'posts'));
    }
}