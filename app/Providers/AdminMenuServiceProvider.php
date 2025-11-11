<?php

namespace App\Providers;

use App\Support\Admin\MenuRegistry;
use Illuminate\Support\ServiceProvider;

class AdminMenuServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerMenuItems();
    }

    protected function registerMenuItems(): void
    {
        MenuRegistry::register('dashboard', [
            'label' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'heroicon-o-home',
            'order' => 1,
        ]);

        MenuRegistry::register('users', [
            'label' => 'Users',
            'route' => 'admin.users.index',
            'icon' => 'heroicon-o-users',
            'permission' => 'users.view',
            'order' => 10,
        ]);

        MenuRegistry::register('services', [
            'label' => 'Services',
            'route' => 'admin.services.index',
            'icon' => 'heroicon-o-briefcase',
            'permission' => 'services.view',
            'order' => 20,
        ]);

        MenuRegistry::register('portfolio', [
            'label' => 'Portfolio',
            'route' => 'admin.projects.index',
            'icon' => 'heroicon-o-photo',
            'permission' => 'projects.view',
            'order' => 30,
            'children' => [
                [
                    'label' => 'Projects',
                    'route' => 'admin.projects.index',
                ],
                [
                    'label' => 'Categories',
                    'route' => 'admin.project-categories.index',
                ],
            ],
        ]);

        MenuRegistry::register('blog', [
            'label' => 'Blog',
            'route' => 'admin.posts.index',
            'icon' => 'heroicon-o-newspaper',
            'permission' => 'posts.view',
            'order' => 40,
            'children' => [
                [
                    'label' => 'Posts',
                    'route' => 'admin.posts.index',
                ],
                [
                    'label' => 'Categories',
                    'route' => 'admin.post-categories.index',
                ],
            ],
        ]);

        MenuRegistry::register('pages', [
            'label' => 'Pages',
            'route' => 'admin.pages.index',
            'icon' => 'heroicon-o-document-text',
            'permission' => 'pages.view',
            'order' => 50,
        ]);

        MenuRegistry::register('messages', [
            'label' => 'Messages',
            'route' => 'admin.messages.index',
            'icon' => 'heroicon-o-envelope',
            'permission' => 'messages.view',
            'order' => 60,
        ]);

        MenuRegistry::register('settings', [
            'label' => 'Settings',
            'route' => 'admin.settings.index',
            'icon' => 'heroicon-o-cog',
            'permission' => 'settings.view',
            'order' => 999,
        ]);
    }
}