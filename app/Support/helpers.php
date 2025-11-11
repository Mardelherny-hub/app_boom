<?php

use App\Support\SEO\SEOManager;

if (!function_exists('seo')) {
    /**
     * Get SEO Manager instance
     */
    function seo(): SEOManager
    {
        return app(SEOManager::class);
    }
}