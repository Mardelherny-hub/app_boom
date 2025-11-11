<?php

namespace App\Providers;

use App\Support\Features\FeatureManager;
use App\Support\Settings\SettingsService;
use Illuminate\Support\ServiceProvider;

class StarterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register SettingsService as singleton
        $this->app->singleton(SettingsService::class, function ($app) {
            return new SettingsService;
        });
        // Register FeatureManager as singleton
        $this->app->singleton(FeatureManager::class, function ($app) {
            return new FeatureManager;
        });
        // Merge configurations
        $this->mergeConfigFrom(__DIR__.'/../../config/starter.php', 'starter');
        $this->mergeConfigFrom(__DIR__.'/../../config/features.php', 'features');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                \App\Console\Commands\StarterInstallCommand::class,
                \App\Console\Commands\FeatureEnableCommand::class,
                \App\Console\Commands\FeatureDisableCommand::class,
                \App\Console\Commands\FeatureStatusCommand::class,
            ]);
            // Publish config files
            $this->publishes([
                __DIR__.'/../../config/starter.php' => config_path('starter.php'),
                __DIR__.'/../../config/features.php' => config_path('features.php'),
            ], 'starter-config');
        }
    }
}
