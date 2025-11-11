<?php

namespace App\Domain\Settings\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingsCacheService
{
    protected const CACHE_KEY = 'app.settings';
    protected const CACHE_TTL = 86400; // 24 hours

    /**
     * Get all settings from cache or database.
     */
    public function all(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return DB::table('settings')
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    /**
     * Get a specific setting value.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $settings = $this->all();
        return $settings[$key] ?? $default;
    }

    /**
     * Clear settings cache.
     */
    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Refresh cache after update.
     */
    public function refresh(): array
    {
        $this->flush();
        return $this->all();
    }
}