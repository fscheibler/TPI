<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Source;
use App\Models\Result;
use Illuminate\Support\Facades\Log;

class ResultService
{
    /**
     * Enregistre les résultats dans la base de données.
     *
     * @param string $siteName Le nom du site pour lequel les résultats sont enregistrés.
     * @param string $sourceName Le nom de la source des résultats.
     * @param string $data Les données à enregistrer.
     * @return void
     */
    public function saveResults(string $siteName, string $sourceName, array $data): void
    {
        try {
            $project = Project::updateOrCreate(['name' => $siteName]);
            $source = Source::updateOrCreate(['name' => $sourceName]);

            $project->results()->create([
                'source_id'=> $source->id,
                'data' => $data
            ]);

            //Log::info("Résultat enregistré pour le projet '{$siteName}' (ID: {$project->id}) depuis '{$sourceName}' (ID: {$source->id}). Données: " . json_encode($data));
        } catch (Exception $e) {
            Log::error("Erreur lors de l'enregistrement des résultats pour '{$siteName}' depuis '{$sourceName}': " . $e->getMessage());
        }
    }
}
