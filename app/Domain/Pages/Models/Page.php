<?php

namespace App\Domain\Pages\Models;

use App\Domain\Common\Traits\HasPublishedScope;
use App\Domain\Common\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, SoftDeletes, HasSlug, HasPublishedScope;

    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'description',
        'blocks',
        'template',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'blocks' => 'array',
            'published_at' => 'datetime',
        ];
    }

    /**
     * Boot the model.
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            // Generate UUID if not present
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
            
            // Generate slug if not present (backup if HasSlug trait fails)
            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    /**
     * Get blocks by type.
     */
    public function getBlocksByType(string $type): array
    {
        if (!$this->blocks) {
            return [];
        }

        return collect($this->blocks)
            ->filter(fn($block) => ($block['type'] ?? '') === $type)
            ->values()
            ->toArray();
    }

    /**
     * Check if page uses a specific template.
     */
    public function usesTemplate(string $template): bool
    {
        return $this->template === $template;
    }
}