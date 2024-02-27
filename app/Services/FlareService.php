<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class FlareService
{
    private $client;
    private $apiToken;

    public function __construct()
    {
        $this->apiToken = config('provider.flare.api_key'); // Assurez-vous que cette configuration est correcte.
        $this->client = new Client([
            'base_uri' => 'https://flareapp.io/api/',
            'headers' => [
                'Accept' => 'application/json',
            ],
            'verify' => false,
        ]);
    }

    public function getProjectIdByName($siteName)
    {
        try {
            // Récupérer tous les projets
            $response = $this->client->get('projects?api_token=' . $this->apiToken);
            $projects = json_decode($response->getBody()->getContents(), true);

            // Filtrer pour trouver le projet par son nom
            foreach ($projects['data'] as $project) {
                if ($project['name'] === $siteName) {
                    Log::info("Projet id pour {$siteName} : {$project['id']}.");
                    return $project['id'];
                }
            }

            Log::info("Aucun projet trouvé pour {$siteName}.");
            return null;
        } catch (\Exception $e) {
            Log::error("Erreur lors de la récupération du projet {$siteName} : " . $e->getMessage());
            return null;
        }
    }

    public function getProjectErrors($siteName)
    {
        $projectId = $this->getProjectIdByName($siteName);

        if (!$projectId) {
            return null;
        }

        try {

            $response = $this->client->get("projects/{$projectId}?api_token=" . $this->apiToken."&status=open"); // Assurez-vous que cette URL est correcte selon la documentation de l'API
            $errors = json_decode($response->getBody()->getContents(), true);

            Log::info("Erreurs récupérées pour le projet {$siteName}.");
            return $errors;
        } catch (\Exception $e) {
            Log::error("Erreur lors de la récupération des erreurs pour le projet {$siteName} : " . $e->getMessage());
            return null;
        }
    }
}
