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
                'id' => $project->id,
                'domain' => $domain,
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

        return !$result || $result->data['summarized_check_result'] !== 'succeeded';
    }

    private function getFlareStatus($projectId)
    {

        $result = Result::where('project_id', $projectId)
            ->whereHas('source', fn($query) => $query->whereName('flare'))
            ->latest('created_at')
            ->first();

        return !$result || !empty($result->data['data']);

    }

    public function render()
    {
        return view('livewire.projects-overview');
    }
}
