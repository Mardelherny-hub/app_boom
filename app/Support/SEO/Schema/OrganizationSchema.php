<?php

namespace App\Support\SEO\Schema;

class OrganizationSchema extends SchemaBuilder
{
    protected function getType(): string
    {
        return 'Organization';
    }

   public function build(): array
    {
        // Get social URLs from settings
        $socialUrls = array_filter([
            settings('facebook_url'),
            settings('twitter_url'),
            settings('instagram_url'),
            settings('linkedin_url'),
            settings('social_youtube_url'),
            settings('social_github_url'),
        ]);

        // Get available languages
        $languages = explode(',', settings('company_languages', 'English'));
        $languages = array_map('trim', $languages);

        $data = [
            'name' => settings('company_name', config('app.name')),
            'url' => url('/'),
            'logo' => url(settings('company_logo_url', '/images/logo.png')),
            'description' => settings('company_description', 'Modern web agency'),
        ];

        // Add address if available
        if (settings('company_street_address') || settings('company_city')) {
            $data['address'] = [
                '@type' => 'PostalAddress',
                'streetAddress' => settings('company_street_address', ''),
                'addressLocality' => settings('company_city', ''),
                'addressRegion' => settings('company_state', ''),
                'postalCode' => settings('company_postal_code', ''),
                'addressCountry' => settings('company_country', ''),
            ];
        }

        // Add contact point if phone available
        if (settings('contact_phone')) {
            $data['contactPoint'] = [
                '@type' => 'ContactPoint',
                'telephone' => settings('contact_phone'),
                'contactType' => 'customer service',
                'availableLanguage' => $languages,
            ];
        }

        // Add social media links if available
        if (!empty($socialUrls)) {
            $data['sameAs'] = $socialUrls;
        }

        return $data;
    }
}