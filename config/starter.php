<?php

return [
    /*
|--------------------------------------------------------------------------
| Starter Kit Version
|--------------------------------------------------------------------------
*/
    'version' => '1.1.0',
    /*
|--------------------------------------------------------------------------
| App Name Override
|--------------------------------------------------------------------------
| Override the app name for the starter kit
*/
    'name' => env('STARTER_APP_NAME', config('app.name')),
    /*
|--------------------------------------------------------------------------
| Default Admin Panel
|--------------------------------------------------------------------------
| Options: 'livewire', 'filament'
*/
    'admin_panel' => env('STARTER_ADMIN_PANEL', 'livewire'),
    /*
|--------------------------------------------------------------------------
| Default Credentials
|--------------------------------------------------------------------------
| Used for seeding the database
*/
    'default_admin' => [
        'name' => 'Admin User',
        'email' => env('STARTER_ADMIN_EMAIL', 'admin@starter.local'),
        'password' => env('STARTER_ADMIN_PASSWORD', 'password'),
    ],
    /*
|--------------------------------------------------------------------------
| Default Media Settings
|--------------------------------------------------------------------------
*/
    'media' => [
        'max_file_size' => 10240, // KB (10MB)
        'allowed_image_types' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'],
        'allowed_document_types' => ['pdf', 'doc', 'docx', 'xls', 'xlsx'],
        'image_quality' => 85,
        'thumbnail_sizes' => [
            'thumb' => [150, 150],
            'medium' => [400, 400],
            'large' => [800, 800],
        ],
    ],
    /*
|--------------------------------------------------------------------------
| Pagination
|--------------------------------------------------------------------------
*/
    'pagination' => [
        'default_per_page' => 15,
        'admin_per_page' => 20,
        'max_per_page' => 100,
    ],
    /*
|--------------------------------------------------------------------------
| SEO Defaults
|--------------------------------------------------------------------------
*/
    'seo' => [
        'separator' => ' | ',
        'suffix' => config('app.name'),
        'default_og_type' => 'website',
        'twitter_card_type' => 'summary_large_image',
    ],
    /*
|--------------------------------------------------------------------------
| Cache Settings
|--------------------------------------------------------------------------
*/
    'cache' => [
        'settings_ttl' => 3600, // 1 hour
        'menu_ttl' => 3600, // 1 hour
        'pages_ttl' => 600, // 10 minutes
    ],
    /*
|--------------------------------------------------------------------------
| Security
|--------------------------------------------------------------------------
*/
    'security' => [
        'force_https' => env('STARTER_FORCE_HTTPS', false),
        'enable_csp' => env('STARTER_ENABLE_CSP', true),
        'enable_security_headers' => env('STARTER_SECURITY_HEADERS', true),
    ],
];
