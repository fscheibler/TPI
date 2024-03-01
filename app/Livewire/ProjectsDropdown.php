<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class ProjectsDropdown extends Component
{
    public $projects;

    public $selectedProject;

    public function mount()
    {
        $this->projects = Project::all();
    }

    public function render()
    {
        return view('livewire.projects-dropdown');
    }

    public function redirectToProject()
    {
        if (empty($this->selectedProject)) {
            return;
        } else {
            return redirect()->route('projects.show', ['project' => $this->selectedProject]);
        }
    }
}
