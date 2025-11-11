<?php

namespace Database\Seeders\Domain;

use App\Support\Settings\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            [
                'key' => 'site_name',
                'value' => 'Agency Starter Kit',
                'type' => 'string',
                'group' => 'general',
                'label' => 'Site Name',
                'order' => 1,
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Your Perfect Starting Point',
                'type' => 'string',
                'group' => 'general',
                'label' => 'Site Tagline',
                'order' => 2,
            ],
            [
                'key' => 'site_description',
                'value' => 'A professional starter kit for web agencies',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Description',
                'order' => 3,
            ],
            // SEO
            [
                'key' => 'meta_title_default',
                'value' => 'Agency Starter Kit - Professional Web Solutions',
                'type' => 'string',
                'group' => 'seo',
                'label' => 'Default Meta Title',
                'order' => 1,
            ],
            [
                'key' => 'meta_description_default',
                'value' => 'Professional starter kit for web development agencies',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Default Meta Description',
                'order' => 2,
            ],
            // Contact
            [
                'key' => 'contact_email',
                'value' => 'contact@starter.local',
                'type' => 'string',
                'group' => 'contact',
                'label' => 'Contact Email',
                'order' => 1,
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1 (555) 123-4567',
                'type' => 'string',
                'group' => 'contact',
                'label' => 'Contact Phone',
                'order' => 2,
            ],
            // Social
            [
                'key' => 'facebook_url',
                'value' => '',
                'type' => 'string',
                'group' => 'social',
                'label' => 'Facebook URL',
                'order' => 1,
            ],
            [
                'key' => 'twitter_url',
                'value' => '',
                'type' => 'string',
                'group' => 'social',
                'label' => 'Twitter URL',
                'order' => 2,
            ],
            [
                'key' => 'instagram_url',
                'value' => '',
                'type' => 'string',
                'group' => 'social',
                'label' => 'Instagram URL',
                'order' => 3,
            ],
            [
                'key' => 'linkedin_url',
                'value' => '',
                'type' => 'string',
                'group' => 'social',
                'label' => 'LinkedIn URL',
                'order' => 4,
            ],

            // ============================================
            // COMPANY INFO (para Schema.org)
            // ============================================
            [
                'key' => 'company_name',
                'value' => 'Boom Agency',
                'type' => 'string',
                'group' => 'company',
                'label' => 'Company Name',
                'order' => 1,
            ],
            [
                'key' => 'company_description',
                'value' => 'Modern web agency providing innovative digital solutions',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Company Description',
                'order' => 2,
            ],
            [
                'key' => 'company_logo_url',
                'value' => '/images/logo.png',
                'type' => 'string',
                'group' => 'company',
                'label' => 'Company Logo URL',
                'order' => 3,
            ],

            // ============================================
            // ADDRESS (para Schema.org LocalBusiness)
            // ============================================
            [
                'key' => 'company_street_address',
                'value' => '',
                'type' => 'string',
                'group' => 'company',
                'label' => 'Street Address',
                'order' => 4,
            ],
            [
                'key' => 'company_city',
                'value' => '',
                'type' => 'string',
                'group' => 'company',
                'label' => 'City',
                'order' => 5,
            ],
            [
                'key' => 'company_state',
                'value' => '',
                'type' => 'string',
                'group' => 'company',
                'label' => 'State/Region',
                'order' => 6,
            ],
            [
                'key' => 'company_postal_code',
                'value' => '',
                'type' => 'string',
                'group' => 'company',
                'label' => 'Postal Code',
                'order' => 7,
            ],
            [
                'key' => 'company_country',
                'value' => '',
                'type' => 'string',
                'group' => 'company',
                'label' => 'Country',
                'order' => 8,
            ],

            // ============================================
            // SEO HOMEPAGE
            // ============================================
            [
                'key' => 'seo_home_title',
                'value' => 'Boom Agency - Web Development & Digital Solutions',
                'type' => 'string',
                'group' => 'seo',
                'label' => 'Home Page Title',
                'order' => 10,
            ],
            [
                'key' => 'seo_home_description',
                'value' => 'Professional web development agency specializing in modern digital solutions',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Home Page Description',
                'order' => 11,
            ],

            // ============================================
            // SEO PAGES DEFAULTS
            // ============================================
            [
                'key' => 'seo_blog_title',
                'value' => 'Blog',
                'type' => 'string',
                'group' => 'seo',
                'label' => 'Blog Index Title',
                'order' => 20,
            ],
            [
                'key' => 'seo_blog_description',
                'value' => 'Latest news, articles and updates from our blog',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Blog Index Description',
                'order' => 21,
            ],
            [
                'key' => 'seo_services_title',
                'value' => 'Our Services',
                'type' => 'string',
                'group' => 'seo',
                'label' => 'Services Index Title',
                'order' => 22,
            ],
            [
                'key' => 'seo_services_description',
                'value' => 'Discover all the services we offer for your business',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Services Index Description',
                'order' => 23,
            ],
            [
                'key' => 'seo_portfolio_title',
                'value' => 'Portfolio',
                'type' => 'string',
                'group' => 'seo',
                'label' => 'Portfolio Index Title',
                'order' => 24,
            ],
            [
                'key' => 'seo_portfolio_description',
                'value' => 'Explore our projects and success stories',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Portfolio Index Description',
                'order' => 25,
            ],
            [
                'key' => 'seo_contact_title',
                'value' => 'Contact Us',
                'type' => 'string',
                'group' => 'seo',
                'label' => 'Contact Page Title',
                'order' => 26,
            ],
            [
                'key' => 'seo_contact_description',
                'value' => 'Get in touch with us. We are here to help you',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Contact Page Description',
                'order' => 27,
            ],

            // ============================================
            // SOCIAL MEDIA (para Schema.org)
            // ============================================
            [
                'key' => 'social_youtube_url',
                'value' => '',
                'type' => 'string',
                'group' => 'social',
                'label' => 'YouTube URL',
                'order' => 5,
            ],
            [
                'key' => 'social_github_url',
                'value' => '',
                'type' => 'string',
                'group' => 'social',
                'label' => 'GitHub URL',
                'order' => 6,
            ],

            // ============================================
            // LANGUAGES (para Schema.org)
            // ============================================
            [
                'key' => 'company_languages',
                'value' => 'English,Spanish',
                'type' => 'string',
                'group' => 'company',
                'label' => 'Available Languages (comma separated)',
                'order' => 9,
            ],
        ];
        foreach ($settings as $setting) {
            Setting::create($setting);
        }

    }
}
