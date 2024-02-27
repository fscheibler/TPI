<?php

namespace App\Console\Commands;

use App\Services\FlareService;
use App\Services\OhDearService;
use App\Services\ResultService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class CheckSitesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-sites-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $resultService = app(ResultService::class);

        $sites = config('sites');

        $delayInSeconds = 1;

        foreach ($sites as $siteName => $services) {
            foreach ($services as $serviceName => $serviceConfig) {
                if (!$serviceConfig['enabled']) {
                    continue;
                }

                $studlyServiceName = Str::studly($serviceName);

                $serviceClass = "App\\Services\\{$studlyServiceName}Service";

                $service = app($serviceClass);

                sleep($delayInSeconds);

                $data = $service->getSiteData($siteName);

                if ($data) {
                    $resultService->saveResults($siteName, $serviceName, $data);
                } else {
                    Log::warning("{$studlyServiceName}: Aucune donnée récupérée pour {$siteName}.");
                }

            }
        }
    }
}
