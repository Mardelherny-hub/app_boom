<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class StarterInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'starter:install 
    {--fresh : Fresh installation (drops all tables)}
    {--seed : Seed the database}
    {--force : Force the operation to run}';

    /**
     * The console command description.
     */
    protected $description = 'Install the Starter Kit';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🚀 Installing Agency Starter Kit v'.starter_version());
        $this->newLine();
        // Confirm if production
        if (config('app.env') === 'production' && ! $this->option('force')) {
            if (! $this->confirm('You are in PRODUCTION environment. Continue?')) {
                $this->error('Installation cancelled.');

                return self::FAILURE;
            }
        }
        // Run migrations
        $this->info('📦 Running migrations...');
        $migrateCommand = $this->option('fresh') ? 'migrate:fresh' : 'migrate';
        Artisan::call($migrateCommand, ['--force' => true], $this->output);
        $this->info('✅ Migrations completed');
        $this->newLine();
        // Seed database
        if ($this->option('seed') || $this->confirm('Seed the database with sample data?')) {
            $this->info('🌱 Seeding database...');
            Artisan::call('db:seed', ['--force' => true], $this->output);
            $this->info('✅ Database seeded');
            $this->newLine();
        }
        // Create storage link
        $this->info('🔗 Creating storage link...');
        Artisan::call('storage:link', [], $this->output);
        $this->info('✅ Storage link created');
        $this->newLine();
        // Clear caches
        $this->info('🧹 Clearing caches...');
        Artisan::call('cache:clear', [], $this->output);
        Artisan::call('config:clear', [], $this->output);
        Artisan::call('route:clear', [], $this->output);
        Artisan::call('view:clear', [], $this->output);
        $this->info('✅ Caches cleared');
        $this->newLine();
        // Display credentials
        $this->displayCredentials();
        $this->info('🎉 Installation completed successfully!');

        return self::SUCCESS;
    }

    /**
     * Display default credentials.
     */
    protected function displayCredentials(): void
    {
        $this->info('📧 Default Admin Credentials:');
        $this->table(
            ['Field', 'Value'],
            [
                ['Email', config('starter.default_admin.email')],
                ['Password', config('starter.default_admin.password')],
            ]
        );
        $this->warn('⚠️ Please change these credentials after first login!');
        $this->newLine();
    }
}
