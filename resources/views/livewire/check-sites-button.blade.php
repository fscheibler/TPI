<div x-data="{ loading: false }">
    <button
        x-on:click="loading = true; $wire.checkSites().then(() => { loading = false; })"
        :disabled="loading"
        class="disabled:opacity-50 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    >
        <template x-if="!loading">
            <span>Synchroniser les données</span>
        </template>
        <template x-if="loading">
            <span>Chargement...</span>
        </template>
    </button>

    <div>
        @if (session()->has('message'))
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform opacity-0 -translate-y-10"
                x-transition:enter-end="transform opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="transform opacity-100 translate-y-0"
                x-transition:leave-end="transform opacity-0 -translate-y-10"
                class="mt-24 fixed top-0 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white text-sm p-3 rounded-lg shadow-lg z-5000"
            >
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>




