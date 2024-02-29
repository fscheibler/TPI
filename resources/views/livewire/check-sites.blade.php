<div>
    <button wire:click="runCheckSitesCommand" {{ $isRunning ? 'disabled' : '' }}>
        {{ $isRunning ? 'Exécution...' : 'Exécuter la Commande' }}
    </button>

    <div x-data="{ showModal: @entangle('showModal') }">
        @component('components.modal', ['name' => 'checkSitesModal', 'show' => 'showModal', 'maxWidth' => '2xl'])
            Test
        @endcomponent
    </div>
</div>
