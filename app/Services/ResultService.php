<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Source;
use App\Models\Result;
use Illuminate\Support\Facades\Log;

class ResultService
{
    public function saveResults($siteName, $sourceName, $data)
    {

        $project = Project::firstOrCreate(['name' => $siteName]);

        $source = Source::firstOrCreate(['name' => $sourceName]);

        $result = new Result();
        $result->project_id = $project->id;
        $result->source_id = $source->id;
        $result->data = json_encode($data);
        $result->save();

        Log::info("Résultat enregistré pour le projet {$siteName} depuis {$sourceName}.");
    }
}
