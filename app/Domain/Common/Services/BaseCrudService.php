<?php

namespace App\Domain\Common\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class BaseCrudService
{
    /**
     * The model instance.
     */
    protected Model $model;

    /**
     * BaseCrudService constructor.
     */
    public function __construct()
    {
        $this->model = $this->getModel();
    }

    /**
     * Get the model instance.
     */
    abstract protected function getModel(): Model;

    /**
     * Get all records.
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Get paginated records.
     */
    public function paginate(?int $perPage = null, array $filters = []): LengthAwarePaginator
    {
        $perPage = $perPage ?? config('starter.pagination.default_per_page', 15);
        
        $query = $this->model->query();
        $query = $this->applyFilters($query, $filters);
        
        return $query->paginate($perPage);
    }

    protected function applyFilters($query, array $filters = [])
    {
        return $query;
    }

    /**
     * Find a record by ID.
     */
    public function find(int|string $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * Find a record by ID or fail.
     */
    public function findOrFail(int|string $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Find a record by slug.
     */
    public function findBySlug(string $slug): ?Model
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Create a new record.
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update a record.
     */
    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    /**
     * Delete a record.
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * Force delete a record.
     */
    public function forceDelete(Model $model): bool
    {
        return $model->forceDelete();
    }

    /**
     * Restore a soft deleted record.
     */
    public function restore(Model $model): bool
    {
        return $model->restore();
    }

    /**
     * Get published records (if model has published_at).
     */
    public function published(): Collection
    {
        if (method_exists($this->model, 'scopePublished')) {
            return $this->model->published()->get();
        }

        return $this->all();
    }

    /**
     * Get featured records (if model has featured column).
     */
    public function featured(): Collection
    {
        if (method_exists($this->model, 'scopeFeatured')) {
            return $this->model->featured()->get();

        }

        return collect();
    }

    /**
     * Search records.
     */
    public function search(string $query, array $columns = ['title', 'name']): Collection
    {
        $search = $this->model->query();

        foreach ($columns as $column) {
            $search->orWhere($column, 'LIKE', "%{$query}%");
        }

        return $search->get();
    }

    /**
     * Count records.
     */
    public function count(): int
    {
        return $this->model->count();
    }

    /**
     * Check if record exists.
     */
    public function exists(int|string $id): bool
    {
        return $this->model->where('id', $id)->exists();
    }
}
