<?php

namespace App\Domain\Blog\Models;

use App\Domain\Common\Traits\HasPublishedScope;
use App\Domain\Common\Traits\HasSlug;
use App\Domain\Common\Traits\HasViewsCounter;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasSlug, HasPublishedScope, HasViewsCounter, InteractsWithMedia;

    protected $fillable = [
        'uuid',
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured',
        'views',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
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
        
        // Para imágenes insertadas en el contenido del editor
        $this->addMediaCollection('content_images');
    }
    /**
     * Get the author of this post.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the category for this post.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    /**
     * Scope to get featured posts.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Get reading time in minutes.
     */
    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return max(1, ceil($wordCount / 200)); // Average reading speed: 200 words/min
    }
}