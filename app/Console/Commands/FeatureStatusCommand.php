<?php

namespace App\Console\Commands;

use App\Support\Features\FeatureManager;
use Illuminate\Console\Command;

class FeatureStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'starter:status';

    /**
     * The console command description.
     */
    protected $description = 'Show status of all feature flags';

    /**
     * Execute the console command.
     */
    public function handle(FeatureManager $featureManager): int
    {
        $this->info('🎯 Agency Starter Kit - Feature Status');
        $this->info('Version: ' . starter_version());
        $this->newLine();

        $features = $featureManager->allWithMetadata();
        $rows = [];

        foreach ($features as $key => $data) {
            $status = $data['enabled'] ? '<fg=green>✅ Enabled</>' : '<fg=red>❌ Disabled</>';
            $requirementsMet = $featureManager->requirementsMet($key);
            
            $requirements = '';
            if (!empty($data['requires'])) {
                $requirements = $requirementsMet 
                    ? '<fg=green>✓</>' 
                    : '<fg=yellow>Missing packages</>';
            }

            $rows[] = [
                $key,
                $data['label'],
                $status,
                $requirements,
            ];
        }

        $this->table(
            ['Feature', 'Label', 'Status', 'Requirements'],
            $rows
        );

        $this->newLine();
        $this->info('💡 To enable a feature: php artisan starter:enable {feature}');
        $this->info('💡 To disable a feature: php artisan starter:disable {feature}');

        return self::SUCCESS;
    }
}