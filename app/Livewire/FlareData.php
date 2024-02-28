<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Result;

class FlareData extends Component
{
    public $projectId;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        $result = Result::where('project_id', $this->projectId)
            ->whereHas('source', function ($query) {
                $query->where('name', 'flare');
            })->first();

        $flareData = null;
        if ($result) {
            $decodedData = json_decode($result->data, true);
            $flareData = collect($decodedData['data'])->filter(function ($error) {
                return $error['status'] === 'open';
            })->values()->all();
        }

        return view('livewire.flare-data', compact('flareData'));
    }
}
