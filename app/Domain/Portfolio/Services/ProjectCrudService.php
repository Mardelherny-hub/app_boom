<?php

namespace App\Domain\Portfolio\Services;

use App\Domain\Common\Services\BaseCrudService;
use App\Domain\Portfolio\Models\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectCrudService extends BaseCrudService
{
    protected function getModel(): Model
    {
        return new Project();
    }

    protected function applyFilters($query, array $filters = [])
    {
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('client', 'like', "%{$search}%");
            });
        }

        if (isset($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
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