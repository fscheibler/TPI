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
    protected $description = 'Vérifie l’état des sites configurés et enregistre les résultats.';

    /**
     *  Execute the console command.
     *
     * @param ResultService $resultService
     * @return void
     */
    public function handle(ResultService $resultService) :void
    {
        $sites = config('sites');

        $delayInSeconds = 1;

        foreach ($sites as $siteName => $services) {
            foreach ($services as $serviceName => $serviceConfig) {
                if (!$serviceConfig['enabled']) {
                    continue;
                }

                $studlyServiceName = Str::studly($serviceName);
                $serviceClass = "App\\Services\\{$studlyServiceName}Service";

                if (!class_exists($serviceClass)) {
                    Log::warning("Service {$serviceClass} n'existe pas.");
                    continue;
                }

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
