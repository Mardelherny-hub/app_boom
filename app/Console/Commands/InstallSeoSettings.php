<?php

namespace App\Console\Commands;

use App\Support\Settings\Models\Setting;
use Illuminate\Console\Command;

class InstallSeoSettings extends Command
{
    protected $signature = 'boom:install-seo-settings';
    
    protected $description = 'Install SEO settings for admin panel management';

    public function handle(): int
    {
        $this->info('Installing SEO settings...');

        $settings = $this->getSeoSettings();
        
        $bar = $this->output->createProgressBar(count($settings));
        $bar->start();

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        
        $this->info('✅ SEO settings installed successfully!');
        $this->info('Visit /admin/settings to manage your SEO configuration.');
        
        return Command::SUCCESS;
    }

    protected function getSeoSettings(): array
    {
        return [
            // ============================================
            // COMPANY INFO (para Schema.org)
            // ============================================
            [
                'key' => 'company_name',
                'value' => config('app.name'),
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
            [
                'key' => 'company_languages',
                'value' => 'English,Spanish',
                'type' => 'string',
                'group' => 'company',
                'label' => 'Available Languages (comma separated)',
                'order' => 9,
            ],

            // ============================================
            // SEO HOMEPAGE
            // ============================================
            [
                'key' => 'seo_home_title',
                'value' => config('app.name').' - Web Development & Digital Solutions',
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
        ];
    }
}