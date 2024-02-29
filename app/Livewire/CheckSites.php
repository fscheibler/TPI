<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class CheckSites extends Component
{
    public $isRunning = false;
    public $showModal = false;

    protected $listeners = ['closeModal' => 'closeModal'];

    public function runCheckSitesCommand()
    {
        $this->showModal = true; // Ouvre le modal
        $this->isRunning = true;

        Artisan::call('app:check-sites-command');

        $this->isRunning = false;
        $this->showModal = false; // Ferme le modal après l'exécution de la commande

        $this->dispatchBrowserEvent('command-completed', ['message' => 'La vérification des sites est terminée.']);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.check-sites');
    }
}
