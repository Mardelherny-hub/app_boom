<?php

declare(strict_types=1);

namespace App\Domain\Services\Services;

use App\Domain\Common\Services\BaseCrudService;
use App\Domain\Services\Models\Service;
use Illuminate\Database\Eloquent\Model;

/**
 * Service CRUD Service
 * 
 * Gestiona operaciones CRUD para el módulo de servicios
 */
class ServiceCrudService extends BaseCrudService
{
    /**
     * Get the model instance
     */
    protected function getModel(): Model
    {
        return new Service();
    }

    /**
     * Apply filters to the query
     */
    protected function applyFilters($query, array $filters = [])
    {
        // Search by title or description
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by featured
        if (isset($filters['featured'])) {
            $query->where('featured', (bool) $filters['featured']);
        }

        // Filter by published status
        if (isset($filters['status'])) {
            if ($filters['status'] === 'published') {
                $query->published();
            } elseif ($filters['status'] === 'draft') {
                $query->whereNull('published_at');
            }
        }

        return $query;
    }

    /**
     * Get published services ordered by custom order
     */
    public function getPublishedOrdered()
    {
        return $this->model
            ->published()
            ->ordered()
            ->get();
    }

    /**
     * Get featured services
     */
    public function getFeatured()
    {
        return $this->model
            ->featured()
            ->published()
            ->ordered()
            ->get();
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(int $id): bool
    {
        $service = $this->findOrFail($id);
        $service->featured = !$service->featured;
        return $service->save();
    }

    /**
     * Update order
     */
    public function updateOrder(int $id, int $order): bool
    {
        $service = $this->findOrFail($id);
        $service->order = $order;
        return $service->save();
    }
}