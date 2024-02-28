<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Result;

class ProjectsOverview extends Component
{
    public $projects;

    public function mount()
    {
        $configProjects = config('sites');
        $projects = [];

        foreach ($configProjects as $domain => $config) {
            $project = Project::whereName($domain)->first();

            $ohDearStatus = $project && $config['oh_dear']['enabled'] ? $this->getOhDearStatus($project->id) : null;
            $flareStatus = $project && $config['flare']['enabled'] ? $this->getFlareStatus($project->id) : null;


            $projects[$domain] = [
                'oh_dear' => $ohDearStatus,
                'flare' => $flareStatus,
            ];
        }

        $this->projects = $projects;
    }

    private function getOhDearStatus($projectId)
    {

        $result = Result::where('project_id', $projectId)
            ->whereHas('source', fn($query) => $query->whereName('oh_dear'))
            ->latest('created_at')
            ->first();

        return $result ? json_decode($result->data, true)['summarized_check_result'] !== 'succeeded' : true;
    }

    private function getFlareStatus($projectId)
    {

        $result = Result::where('project_id', $projectId)
            ->whereHas('source', fn($query) => $query->whereName('flare'))
            ->latest('created_at')
            ->first();

        return $result ? !empty(json_decode($result->data, true)['data']) : true;
    }

    public function render()
    {
        return view('livewire.projects-overview');
    }
}
