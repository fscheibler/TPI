<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Result;

class FlareData extends Component
{
    public int $projectId;

    public function mount(int $projectId): void
    {
        $this->projectId = $projectId;
    }

    public function render(): View
    {
        $result = Result::where('project_id', $this->projectId)
            ->whereHas('source', function ($query) {
                $query->where('name', 'flare');
            })->first();

        $flareData = null;
        if ($result) {
            $flareData = collect($result->data['data'])->filter(function ($error) {
                return $error['status'] === 'open';
            })->values()->all();
        }

        return view('livewire.flare-data', compact('flareData'));
    }
}
