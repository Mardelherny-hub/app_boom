<?php

namespace App\Support\Features;

class FeatureManager
{
    /**
     * Check if a feature is enabled.
     */
    public function isEnabled(string $feature): bool
    {
        return (bool) config("features.{$feature}", false);
    }

    /**
     * Check if a feature is disabled.
     */
    public function isDisabled(string $feature): bool
    {
        return ! $this->isEnabled($feature);
    }

    /**
     * Get all features with their status.
     */
    public function all(): array
    {
        $features = config('features');
        // Remove metadata from the array
        unset($features['metadata']);

        return $features;
    }

    /**
     * Get enabled features.
     */
    public function enabled(): array
    {
        return array_filter($this->all(), fn ($status) => $status === true);
    }

    /**
     * Get disabled features.
     */
    public function disabled(): array
    {
        return array_filter($this->all(), fn ($status) => $status === false);
    }

    /**
     * Get feature metadata.
     */
    public function metadata(string $feature): ?array
    {
        return config("features.metadata.{$feature}");
    }

    /**
     * Get all features with metadata.
     */
    public function allWithMetadata(): array
    {
        $features = $this->all();
        $metadata = config('features.metadata', []);

        return collect($features)->map(function ($enabled, $key) use ($metadata) {
            return [
                'enabled' => $enabled,
                'label' => $metadata[$key]['label'] ?? ucfirst($key),
                'description' => $metadata[$key]['description'] ?? '',
                'requires' => $metadata[$key]['requires'] ?? [],
            ];
        })->toArray();
    }

    /**
     * Check if feature requirements are met.
     */
    public function requirementsMet(string $feature): bool
    {
        $metadata = $this->metadata($feature);
        if (! $metadata || empty($metadata['requires'])) {
            return true;

        }
        foreach ($metadata['requires'] as $package) {
            if (! class_exists($package) && ! interface_exists($package)) {
                return false;
            }

            return true;
        }
    }
}
