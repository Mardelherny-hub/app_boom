<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Si el usuario tiene permisos de admin
        if ($user && $this->hasAdminAccess($user)) {
            // Si está intentando acceder a /dashboard, redirigir a /admin
            if ($request->is('dashboard')) {
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }

    protected function hasAdminAccess($user): bool
    {
        // Verificar si tiene algún rol de admin
        return $user->hasAnyRole(['super_admin', 'admin', 'editor']);
    }
}