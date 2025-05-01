<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteStaleLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-stale-logs {days=30 : The number of days to keep logs}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete logs older than a specified number of days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $days = $this->argument('days');
        $this->info("Deleting logs older than {$days} days...");
        $deletedCount = \App\Models\ApiRequestLog::laterThan($days)->delete();
        $this->info("Deleted {$deletedCount} logs older than {$days} days.");
        $this->info('Stale logs deleted successfully.');
    }
}
