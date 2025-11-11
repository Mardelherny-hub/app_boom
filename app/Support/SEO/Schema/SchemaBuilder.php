<?php

namespace App\Support\SEO\Schema;

abstract class SchemaBuilder
{
    protected array $data = [];

    /**
     * Get schema type
     */
    abstract protected function getType(): string;

    /**
     * Build schema data
     */
    abstract public function build(): array;

    /**
     * Convert to JSON-LD
     */
    public function toJson(): string
    {
        $schema = array_merge(
            [
                '@context' => 'https://schema.org',
                '@type' => $this->getType(),
            ],
            $this->build()
        );

        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Render as script tag
     */
    public function render(): string
    {
        return '<script type="application/ld+json">' . $this->toJson() . '</script>';
    }
}