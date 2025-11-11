<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        if (! config('starter.security.enable_security_headers', true)) {
            return $response;
        }
        // X-Frame-Options
        $response->headers->set('X-Frame-Options', 'DENY');
        // X-Content-Type-Options
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        // X-XSS-Protection
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        // Referrer-Policy
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        // Permissions-Policy
        $response->headers->set(
            'Permissions-Policy',
            'geolocation=(), microphone=(), camera=()'
        );
        // Strict-Transport-Security (only in production with HTTPS)
        if (config('app.env') === 'production' && $request->secure()) {
            $response->headers->set(
                'Strict-Transport-Security',
                'max-age=31536000; includeSubDomains'
            );
        }

        return $response;
    }
}
