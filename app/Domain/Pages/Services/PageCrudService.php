<?php

namespace App\Domain\Pages\Services;

use App\Domain\Common\Services\BaseCrudService;
use App\Domain\Pages\Models\Page;
use Illuminate\Database\Eloquent\Model;

class PageCrudService extends BaseCrudService
{
    protected function getModel(): Model
    {
        return new Page();
    }

    protected function applyFilters($query, array $filters = [])
    {
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if (isset($filters['template'])) {
            $query->where('template', $filters['template']);
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
}