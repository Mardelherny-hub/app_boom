<?php

namespace App\Domain\Portfolio\Models;

use App\Domain\Common\Traits\HasPublishedScope;
use App\Domain\Common\Traits\HasSlug;
use App\Domain\Common\Traits\HasViewsCounter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Project extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasSlug, HasPublishedScope, HasViewsCounter, InteractsWithMedia;

    protected $fillable = [
        'uuid',
        'category_id',
        'title',
        'slug',
        'description',
        'content',
        'client',
        'project_date',
        'featured',
        'views',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'project_date' => 'date',
            'featured' => 'boolean',
            'views' => 'integer',
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
        $this->addMediaCollection('featured_image')
            ->singleFile();

        $this->addMediaCollection('gallery');
    }

    /**
     * Get the category for this project.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    /**
     * Scope to get featured projects.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}