<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if (config('starter.security.force_https') && config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Clear response cache on model events
        $models = [
            \App\Domain\Services\Models\Service::class,
            \App\Domain\Portfolio\Models\Project::class,
            \App\Domain\Blog\Models\Post::class,
            \App\Domain\Pages\Models\Page::class,
        ];

        foreach ($models as $model) {
            $model::saved(function () {
                
            });
            
            $model::deleted(function () {
                
            });
        }
    }
}
