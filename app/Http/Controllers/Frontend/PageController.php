<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Domain\Pages\Models\Page;

class PageController extends Controller
{
    /**
     * Display dynamic page by slug.
     */
    public function show(Page $page)
    {
        // Verificar que esté publicado
        if (!$page->published_at || $page->published_at->isFuture()) {
            abort(404);
        }

        seo()
            ->title($page->meta_title ?: $page->title)
            ->description($page->meta_description ?: $page->description)
            ->canonical(route('pages.show', $page->slug));

        return view('frontend.pages.show', compact('page'));
    }
}