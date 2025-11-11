<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FeatureEnableCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'starter:enable {feature : The feature to enable}';

    /**
     * The console command description.
     */
    protected $description = 'Enable a feature flag';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $feature = $this->argument('feature');
        if (! $this->featureExists($feature)) {
            $this->error("Feature '{$feature}' does not exist.");
            $this->listAvailableFeatures();

            return self::FAILURE;
        }
        if (feature($feature)) {
            $this->warn("Feature '{$feature}' is already enabled.");

            return self::SUCCESS;
        }
        $this->updateEnvFile($feature, 'true');

        $this->info("✅ Feature '{$feature}' has been enabled.");
        $this->warn('🔄 Run `php artisan config:clear` to apply changes.');

        return self::SUCCESS;
    }

    /**
     * Check if feature exists in config.
     */
    protected function featureExists(string $feature): bool
    {
        return array_key_exists($feature, config('features.metadata', []));
    }

    /**
     * Update .env file with feature flag.
     */
    protected function updateEnvFile(string $feature, string $value): void
    {
        $envKey = 'STARTER_FEATURE_'.strtoupper($feature);
        $envPath = base_path('.env');
        if (! File::exists($envPath)) {
            $this->error('.env file not found.');

            return;
        }
        $envContent = File::get($envPath);
        // Check if key exists
        if (preg_match("/^{$envKey}=/m", $envContent)) {
            // Update existing key
            $envContent = preg_replace(
                "/^{$envKey}=.*/m",
                "{$envKey}={$value}",
                $envContent
            );
        } else {
            // Append new key
            $envContent .= "\n{$envKey}={$value}\n";
        }

        File::put($envPath, $envContent);
    }

    /**
     * List available features.
     */
    protected function listAvailableFeatures(): void
    {
        $this->info('Available features:');

        $features = config('features.metadata', []);
        $rows = [];
        foreach ($features as $key => $data) {
            $rows[] = [
                $key,
                $data['label'] ?? ucfirst($key),
                feature($key) ? '✅ Enabled' : '❌ Disabled',
            ];
        }
        $this->table(['Feature', 'Label', 'Status'], $rows);
    }
}
