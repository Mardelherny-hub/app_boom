<?php

namespace App\Support\Settings;

use App\Support\Settings\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    /**
     * Cache key for settings.
     */
    protected const CACHE_KEY = 'app_settings';

    /**
     * Cache TTL in seconds.
     */
    protected int $cacheTtl;

    public function __construct()
    {
        $this->cacheTtl = config('starter.cache.settings_ttl', 3600);
    }

    /**
     * Get all settings from cache.
     */
    public function all(): array
    {
        return Cache::remember(self::CACHE_KEY, $this->cacheTtl, function () {
            return Setting::ordered()
                ->get()
                ->pluck('casted_value', 'key')
                ->toArray();
        });
    }

    /**
     * Get a specific setting value.
     */
    public function get(string $key, $default = null)
    {
        $settings = $this->all();

        return $settings[$key] ?? $default;
    }

    /**
     * Set a setting value.
     */
    public function set(string $key, $value, ?string $type = null): bool
    {
        $setting = Setting::firstOrNew(['key' => $key]);
        $setting->value = $this->castValue($value, $type);
        if ($type) {
            $setting->type = $type;
        }
        $saved = $setting->save();
        if ($saved) {
            $this->clearCache();
        }

        return $saved;
    }

    /**
     * Check if a setting exists.
     */
    public function has(string $key): bool
    {
        $settings = $this->all();

        return array_key_exists($key, $settings);
    }

    /**
     * Delete a setting.
     */
    public function forget(string $key): bool
    {
        $deleted = Setting::where('key', $key)->delete();

        if ($deleted) {
            $this->clearCache();
        }

        return $deleted;
    }

    /**
     * Get settings by group.
     */
    public function group(string $group): array
    {
        return Cache::remember(self::CACHE_KEY.".group.{$group}", $this->cacheTtl, function () use ($group) {
            return Setting::byGroup($group)
                ->ordered()
                ->get()
                ->pluck('casted_value', 'key')
                ->toArray();
        });
    }

    /**
     * Clear settings cache.
     */
    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);

        // Clear group caches
        $groups = Setting::distinct()->pluck('group');
        foreach ($groups as $group) {
            Cache::forget(self::CACHE_KEY.".group.{$group}");
        }
    }

    /**
     * Cast value to proper type for storage.
     */
    protected function castValue($value, ?string $type = null): string
    {
        if ($type === 'json' || is_array($value)) {
            return json_encode($value);
        }
        if ($type === 'boolean' || is_bool($value)) {
            return $value ? '1' : '0';
        }

        return (string) $value;
    }
}
