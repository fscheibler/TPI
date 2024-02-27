<?php

namespace App\Services;


use Illuminate\Support\Facades\Log;

use GuzzleHttp\Client;

class OhDearService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://ohdear.app/api/',
            'headers' => [
                'Authorization' => 'Bearer ' . config('provider.ohdear.api_key'),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function getSiteDetails($siteId)
    {
        try {
            $response = $this->client->request('GET', "sites/{$siteId}", [
                'verify' => false, // Désactiver la vérification SSL (error curl 60 en local)
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error("Erreur lors de la récupération des détails du site : {$e->getMessage()}");
            return null;
        }
    }
}
