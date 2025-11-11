<?php

namespace App\Support\Admin;

class MenuRegistry
{
    protected static array $items = [];

    public static function register(string $key, array $config): void
    {
        $defaults = [
            'label' => '',
            'route' => '',
            'icon' => 'heroicon-o-document',
            'permission' => null,
            'order' => 999,
            'badge' => null,
        ];
        
        // Solo agregar 'children' si existe en $config
        if (isset($config['children'])) {
            $defaults['children'] = [];
        }
        
        static::$items[$key] = array_merge($defaults, $config);
    }

    public static function all(): array
    {
        return collect(static::$items)
            ->sortBy('order')
            ->filter(function ($item) {
                return !$item['permission'] || auth()->user()?->can($item['permission']);
            })
            ->toArray();
    }

    public static function get(string $key): ?array
    {
        return static::$items[$key] ?? null;
    }

    public static function clear(): void
    {
        static::$items = [];
    }
}