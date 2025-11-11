<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Domain\Portfolio\Models\Project;
use App\Domain\Portfolio\Models\ProjectCategory;

class PortfolioController extends Controller
{
    /**
     * Display portfolio listing.
     */
    public function index()
    {
        $projects = Project::published()
            ->with(['category:id,name,slug'])
            ->latest('published_at')
            ->paginate(12);

        $categories = ProjectCategory::has('publishedProjects')
            ->withCount('publishedProjects')
            ->ordered()
            ->get();

        seo()
            ->title(settings('seo_portfolio_title', 'Portfolio'))
            ->description(settings('seo_portfolio_description', ''))
            ->canonical(route('portfolio.index'));

        return view('frontend.portfolio.index', compact('projects', 'categories'));
    }

    /**
     * Display projects by category.
     */
    public function category(ProjectCategory $category)
    {
        $projects = $category->publishedProjects()
            ->with(['category:id,name,slug'])
            ->latest('published_at')
            ->paginate(12);

        $categories = ProjectCategory::has('publishedProjects')
            ->withCount('publishedProjects')
            ->ordered()
            ->get();

        seo()
            ->title(settings('seo_portfolio_title', 'Portfolio'))
            ->description(settings('seo_portfolio_description', ''))
            ->canonical(route('portfolio.index'));

        return view('frontend.portfolio.index', compact('projects', 'categories', 'category'));
    }

    /**
     * Display single project.
     */
    public function show(Project $project)
    {
        if (!$project->published_at || $project->published_at->isFuture()) {
            abort(404);
        }

        $project->incrementViews();

        // Related projects - OPTIMIZADO
        $relatedProjects = Project::published()
            ->where('id', '!=', $project->id)
            ->where('category_id', $project->category_id)
            ->with(['category:id,name,slug'])
            ->latest('published_at')
            ->take(3)
            ->get();

        seo()
            ->title($project->meta_title ?: $project->title)
            ->description($project->meta_description ?: $project->description)
            ->image($project->getFirstMediaUrl('featured_image'))
            ->canonical(route('portfolio.show', $project->slug));

        return view('frontend.portfolio.show', compact('project', 'relatedProjects'));
    }
}