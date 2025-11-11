<?php

namespace App\Domain\Portfolio\Models;

use App\Domain\Common\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
        ];
    }

    /*
    * Get the projects for this category.
    */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'category_id');
    }

    /**
     * Get published projects for this category.
     */
    public function publishedProjects(): HasMany
    {
        return $this->projects()->published();
    }

    /**
     * Scope to order by custom order field.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('name', 'asc');
    }

    /**
     * Override sluggable source for categories.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => false,
            ],
        ];
    }
}
