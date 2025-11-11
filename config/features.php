<?php

return [
    /*
|--------------------------------------------------------------------------
| Feature Flags
|--------------------------------------------------------------------------
| Enable or disable features dynamically
*/
    'newsletter' => env('STARTER_FEATURE_NEWSLETTER', false),
    'testimonials' => env('STARTER_FEATURE_TESTIMONIALS', false),
    'team' => env('STARTER_FEATURE_TEAM', false),
    'faqs' => env('STARTER_FEATURE_FAQS', false),
    'multilang' => env('STARTER_FEATURE_MULTILANG', false),
    /*
|--------------------------------------------------------------------------
| Feature Metadata
|--------------------------------------------------------------------------
| Additional information about each feature
*/
    'metadata' => [
        'newsletter' => [
            'label' => 'Newsletter Module',
            'description' => 'Email newsletter subscription system',
            'requires' => ['getbrevo/brevo-php'],
        ],
        'testimonials' => [
            'label' => 'Testimonials Module',
            'description' => 'Customer testimonials with ratings',
            'requires' => [],
        ],
        'team' => [
            'label' => 'Team Module',
            'description' => 'Team members showcase',
            'requires' => [],
        ],
        'faqs' => [
            'label' => 'FAQs Module',
            'description' => 'Frequently Asked Questions',
            'requires' => [],
        ],
        'multilang' => [
            'label' => 'Multilanguage Module',
            'description' => 'Multi-language support',
            'requires' => ['spatie/laravel-translatable'],
        ],
    ],
];
