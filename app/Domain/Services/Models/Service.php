<?php

namespace App\Domain\Services\Models;

use App\Domain\Common\Traits\HasPublishedScope;
use App\Domain\Common\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Service extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasSlug, HasPublishedScope, InteractsWithMedia;

    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'description',
        'content',
        'icon',
        'featured',
        'order',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
            'order' => 'integer',
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
     * Register media collections.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();

        $this->addMediaCollection('icon')
            ->singleFile();
    }

    /**
     * Scope to get featured services.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope to order by custom order field.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }
}