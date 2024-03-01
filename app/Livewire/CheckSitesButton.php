<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class CheckSitesButton extends Component
{



    public function checkSites()
    {

        Artisan::call('app:check-sites-command');

        session()->flash('message', 'Synchro terminée.');

    }

    public function render()
    {
        return view('livewire.check-sites-button');
    }
}
