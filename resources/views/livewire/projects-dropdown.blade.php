<form wire:submit.prevent="redirectToProject">
    <div class="flex items-center gap-2">
        <select wire:model="selectedProject" class="rounded">
            <option value="">Dashboard</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="rounded">
            Submit
        </button>
    </div>
</form>
