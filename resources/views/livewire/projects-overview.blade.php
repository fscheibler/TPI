<div class="space-y-4">
    @foreach($projects as $project)
        <a href="{{ route('projects.show', ['project' => $project['id']]) }}" class="block w-full bg-white shadow-md rounded-lg p-4 hover:bg-gray-100 transition-colors">
            <div class="flex justify-between items-center">
                <div class="text-lg font-semibold">{{ $project['domain'] }}</div>
                <div class="flex items-center">
                    <!-- Oh Dear Status -->
                    <div class="flex items-center mr-2 lg:mr-4">
                        <span class="mr-1 lg:mr-2">Oh Dear</span>
                        <span class="h-4 w-4 rounded-full {{ $project['oh_dear'] === true ? 'bg-red-500' : ($project['oh_dear'] === false ? 'bg-green-500' : 'bg-gray-500') }}"></span>
                    </div>

                    <!-- Flare Status -->
                    <div class="flex items-center mr-2 lg:mr-4">
                        <span class="mr-1 lg:mr-2">Flare</span>
                        <span class="h-4 w-4 rounded-full {{ $project['flare'] === true ? 'bg-red-500' : ($project['flare'] === false ? 'bg-green-500' : 'bg-gray-500') }}"></span>
                    </div>

                    <!-- Icone de Flèche -->
                    <div class="text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
