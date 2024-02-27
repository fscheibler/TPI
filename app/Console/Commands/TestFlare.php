<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FlareService;

class TestFlare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-flare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Flare API service';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $flareService = new FlareService();
        $siteName = 'blanc-labo.com';

        $errors = $flareService->getProjectErrors($siteName);

        $this->info("Erreurs pour {$siteName} : " . print_r($errors, true));
    }
}
