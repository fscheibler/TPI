<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-800 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-semibold text-xl leading-tight">
                    {{ $project->name }}
                </span>
            </a>
        </div>
    </x-slot>

    <div>
        <div class="mx-auto">
            <div class="bg-white">
                <div class="p-6 text-gray-900 h-100">
                    @livewire('oh-dear-data', ['projectId' => $project->id])
                    @livewire('flare-data', ['projectId' => $project->id])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
