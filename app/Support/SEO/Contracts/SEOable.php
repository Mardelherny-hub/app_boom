<?php

namespace App\Support\SEO\Contracts;

interface SEOable
{
    /**
     * Get SEO title
     */
    public function getSeoTitle(): string;

    /**
     * Get SEO description
     */
    public function getSeoDescription(): string;

    /**
     * Get SEO keywords
     */
    public function getSeoKeywords(): array;

    /**
     * Get SEO image
     */
    public function getSeoImage(): ?string;

    /**
     * Get canonical URL
     */
    public function getCanonicalUrl(): string;
}