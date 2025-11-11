<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Domain\Services\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display services listing.
     */
    public function index()
    {
        $services = Service::published()
            ->ordered()
            ->get();

        seo()
            ->title(settings('seo_services_title', 'Services'))
            ->description(settings('seo_services_description', ''))
            ->canonical(route('services.index'));

        return view('frontend.services.index', compact('services'));
    }

    /**
     * Display single service.
     */
    public function show(Service $service)
    {
        // Verificar que esté publicado
        if (!$service->published_at || $service->published_at->isFuture()) {
            abort(404);
        }

        // Otros servicios
        $otherServices = Service::published()
            ->where('id', '!=', $service->id)
            ->ordered()
            ->take(3)
            ->get();

        seo()
            ->title($service->meta_title ?: $service->title)
            ->description($service->meta_description ?: $service->description)
            ->image($service->getFirstMediaUrl('featured_image'))
            ->canonical(route('services.show', $service->slug));

        return view('frontend.services.show', compact('service', 'otherServices'));
    }
}