<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Providers\OhDearServiceProvider;

class OhDearService
{
    private string $baseUri;
    private string $apiKey;

    public function __construct(string $apiKey, string $baseUri)
    {
        $this->apiKey = $apiKey;
        $this->baseUri = $baseUri;
    }

    /**
     * @param string $siteName
     * @return array|null
     */
    public function getSiteData(string $siteName): ?array
    {
        $config = config("sites");
        $siteId = $config[$siteName]['oh_dear']['site_id'];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->withoutVerifying()->get($this->baseUri . "sites/{$siteId}");

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            Log::error("Erreur lors de la récupération des détails du site pour Oh Dear : {$e->getMessage()}");
            return null;
        }
    }
}
