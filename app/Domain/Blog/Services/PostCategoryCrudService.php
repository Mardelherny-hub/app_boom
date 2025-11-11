<?php

namespace App\Domain\Blog\Services;

use App\Domain\Common\Services\BaseCrudService;
use App\Domain\Blog\Models\PostCategory;
use Illuminate\Database\Eloquent\Model;

class PostCategoryCrudService extends BaseCrudService
{
    protected function getModel(): Model
    {
        return new PostCategory();
    }

    protected function applyFilters($query, array $filters = [])
    {
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        return $query;
    }
}