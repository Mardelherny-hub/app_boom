<?php

namespace App\Domain\Blog\Services;

use App\Domain\Common\Services\BaseCrudService;
use App\Domain\Blog\Models\Post;
use Illuminate\Database\Eloquent\Model;

class PostCrudService extends BaseCrudService
{
    protected function getModel(): Model
    {
        return new Post();
    }

    protected function applyFilters($query, array $filters = [])
    {
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if (isset($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        if (isset($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }

        if (isset($filters['featured'])) {
            $query->where('featured', (bool) $filters['featured']);
        }

        if (isset($filters['status'])) {
            if ($filters['status'] === 'published') {
                $query->published();
            } elseif ($filters['status'] === 'draft') {
                $query->whereNull('published_at');
            }
        }

        return $query;
    }

    public function getFeatured()
    {
        return $this->model->featured()->published()->get();
    }
}