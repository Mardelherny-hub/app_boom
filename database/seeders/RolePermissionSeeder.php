<?php

namespace Database\Seeders;

use App\Domain\Common\Enums\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define the guard name
        $guardName = 'web';

        // Create permissions
        $permissions = [
            // Users
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',

            // Services
            'services.view',
            'services.create',
            'services.edit',
            'services.delete',

            // Projects
            'projects.view',
            'projects.create',
            'projects.edit',
            'projects.delete',

            // Posts
            'posts.view',
            'posts.create',
            'posts.edit',
            'posts.delete',

            // Pages
            'pages.view',
            'pages.create',
            'pages.edit',
            'pages.delete',

            // Messages
            'messages.view',
            'messages.delete',

            // Settings
            'settings.view',
            'settings.edit',
        ];

        // Create all permissions first with explicit guard
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
                ['guard_name' => $guardName]
            );
        }

        // Create roles and assign permissions
        foreach (UserRole::cases() as $roleEnum) {
            // Create or get the role with explicit guard
            $role = Role::firstOrCreate(
                ['name' => $roleEnum->value],
                ['guard_name' => $guardName]
            );
            
            // Get permissions for this role
            $rolePermissions = $roleEnum->permissions();
            
            if (in_array('*', $rolePermissions)) {
                // Super Admin gets all permissions
                $role->syncPermissions(Permission::where('guard_name', $guardName)->get());
            } else {
                // Filter only existing permissions
                $existingPermissions = Permission::where('guard_name', $guardName)
                    ->whereIn('name', $rolePermissions)
                    ->get();
                $role->syncPermissions($existingPermissions);
            }
        }

        $this->command->info('Roles and permissions created successfully!');
    }
}