<?php

namespace App\Domain\Users\Services;

use App\Domain\Common\Services\BaseCrudService;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserCrudService extends BaseCrudService
{
    protected function getModel(): Model
    {
        return new User();
    }

    protected function applyFilters($query, array $filters = [])
    {
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (isset($filters['role'])) {
            $query->role($filters['role']);
        }

        return $query;
    }

    public function createWithRole(array $data, string $role): Model
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user = $this->create($data);
        $user->assignRole($role);

        return $user;
    }

    public function updateWithRole(Model $user, array $data, ?string $role = null): bool
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $updated = $this->update($user, $data);

        if ($role) {
            $user->syncRoles([$role]);
        }

        return $updated;
    }
}