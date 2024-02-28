<div class="space-y-4">
    @foreach($projects as $domain => $status)
        <div class="w-full flex justify-between bg-white shadow-md rounded-lg p-4">
            <div class=" text-lg w-2/3 font-semibold">{{ $domain }}</div>

            <!-- Oh Dear Status -->
            <div class="flex items-center justify-between">
                <span class="mr-4">Oh Dear</span>
                <span class="h-4 w-4 rounded-full {{ $status['oh_dear'] === true ? 'bg-red-500' : ($status['oh_dear'] === false ? 'bg-green-500' : 'bg-gray-500') }}"></span>
            </div>

            <!-- Flare Status -->
            <div class="flex items-center justify-between">
                <span class="mr-4">Flare</span>
                <span class="h-4 w-4 rounded-full {{ $status['flare'] === true ? 'bg-red-500' : ($status['flare'] === false ? 'bg-green-500' : 'bg-gray-500') }}"></span>
            </div>
        </div>
    @endforeach
</div>
