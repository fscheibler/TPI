<form wire:submit.prevent="redirectToProject">
    <div class="flex items-center gap-2">
        <label>
            <select wire:model="selectedProject" class="rounded">
                <option value="">Sélectionner un projet</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </label>

        <button type="submit" class="rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
            Envoyer
        </button>
    </div>
</form>
