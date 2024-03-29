<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;

class FlareService
{
    private string $baseUri;

    private string $apiKey;

    /**
     * @param string $apiKey
     * @param string $baseUri
     */
    public function __construct(string $apiKey, string $baseUri)
    {
        $this->apiKey = $apiKey;
        $this->baseUri = $baseUri;
    }

    /**
     * @param string $siteName
     * @return int|null
     */
    public function getProjectIdByName(string $siteName): ?int
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json'
            ])->withoutVerifying()->get($this->baseUri . 'projects', ['api_token' => $this->apiKey]);

            if ($response->successful()) {
                $projects = $response->json();

                foreach ($projects['data'] as $project) {
                    if ($project['name'] === $siteName) {
                        return (int)$project['id'];
                    }
                }
            }

            return null;
        } catch (RequestException $e) {
            Log::error("Erreur lors de la récupération du projet $siteName : " . $e->getMessage());
            return null;
        }
    }

    /**
     * @param string $siteName
     * @return array|null
     */
    public function getSiteData(string $siteName): ?array
    {
        $projectId = $this->getProjectIdByName($siteName);

        if (!$projectId) {
            return null;
        }

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->withoutVerifying()->get($this->baseUri . "projects/{$projectId}", [
                'api_token' => $this->apiKey,
                'status' => 'open'
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (RequestException $e) {
            Log::error("Erreur lors de la récupération des erreurs pour le projet $siteName : " . $e->getMessage());
            return null;
        }
    }
}
