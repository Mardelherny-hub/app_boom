<?php

namespace Database\Seeders\Domain;

use App\Domain\Common\Enums\UserRole;
use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin
        $superAdmin = User::create([
            'uuid' => Str::uuid()->toString(),
            'name' => 'Super Admin',
            'email' => 'admin@starter.local',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole(UserRole::SUPER_ADMIN->value);

        // Create Admin
        $admin = User::create([
            'uuid' => Str::uuid()->toString(),
            'name' => 'Admin User',
            'email' => 'staff@starter.local',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole(UserRole::ADMIN->value);

        // Create Editor
        $editor = User::create([
            'uuid' => Str::uuid()->toString(),
            'name' => 'Editor User',
            'email' => 'editor@starter.local',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $editor->assignRole(UserRole::EDITOR->value);

        // Create Regular User
        $user = User::create([
            'uuid' => Str::uuid()->toString(),
            'name' => 'Regular User',
            'email' => 'user@starter.local',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole(UserRole::USER->value);

        $this->command->info('Users created successfully!');
    }
}