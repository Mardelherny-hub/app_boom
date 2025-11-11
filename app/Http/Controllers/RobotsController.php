<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsController extends Controller
{
    /**
     * Generate robots.txt
     */
    public function index(): Response
    {
        $isProduction = app()->environment('production');

        $robots = '';

        if ($isProduction) {
            // Production: Allow all
            $robots .= "User-agent: *\n";
            $robots .= "Allow: /\n\n";
            
            // Disallow admin areas
            $robots .= "Disallow: /admin\n";
            $robots .= "Disallow: /admin/*\n";
            $robots .= "Disallow: /login\n";
            $robots .= "Disallow: /register\n\n";
        } else {
            // Staging/Dev: Block all
            $robots .= "User-agent: *\n";
            $robots .= "Disallow: /\n\n";
        }

        // Sitemap
        $robots .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($robots, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}