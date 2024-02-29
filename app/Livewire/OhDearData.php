<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Result;

class OhDearData extends Component
{
    public int $projectId;

    public function mount(int $projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        $result = Result::where('project_id', $this->projectId)
            ->whereHas('source', function ($query) {
                $query->where('name', 'oh_dear');
            })->first();

        $ohDearData = $result ? $result->data : null;

        return view('livewire.oh-dear-data', compact('ohDearData'));
    }
}
