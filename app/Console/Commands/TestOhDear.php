<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OhDearService;

class TestOhDear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-oh-dear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Oh Dear API service';

    /**
     * Execute the console command.
     */
    public function handle(OhDearService $ohDearService) :void
    {

        $siteDetails = $ohDearService->getSiteData('firstpoint.ch');

        $this->info("Détails du site : " . print_r($siteDetails, true));
    }
}
