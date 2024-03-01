<div class="py-4">
    @if(!empty($flareData) && count($flareData) > 0)
        <!-- Tableau pour les grands écrans -->
        <div class="hidden sm:block">
            <table class="w-full divide-y divide-gray-200 shadow rounded-lg border-2">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-bold uppercase tracking-wider">
                        Message d'erreur
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-bold uppercase tracking-wider">
                        Fichier
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-bold uppercase tracking-wider">
                        Ligne
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-bold uppercase tracking-wider">
                        Première occurrence
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-bold uppercase tracking-wider">
                        Dernière occurrence
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($flareData as $error)
                    <tr>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-900 break-words">
                            {{ $error['exception_message'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $error['file'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $error['line_number'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($error['first_seen_at'])->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($error['last_seen_at'])->format('d-m-Y') }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Affichage alternatif pour les petits écrans -->
        <div class="sm:hidden">
            @foreach($flareData as $error)
                <div class="bg-white shadow rounded-lg p-4 mb-4 border-2">
                    <div class="break-words"><strong>Message d'erreur:</strong> {{ $error['exception_message'] }}</div>
                    <div class="break-words"><strong>Fichier:</strong> {{ $error['file'] }}</div>
                    <div class="break-words"><strong>Ligne:</strong> {{ $error['line_number'] }}</div>
                    <div class="break-words"><strong>Première occurrence:</strong> {{ \Carbon\Carbon::parse($error['first_seen_at'])->format('d-m-Y') }}</div>
                    <div class="break-words"><strong>Dernière occurrence:</strong> {{ \Carbon\Carbon::parse($error['last_seen_at'])->format('d-m-Y') }}</div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white shadow rounded-lg p-4 border-2">
            <div class="text-gray-900">Tout va bien du côté de Flare, aucune erreur non résolue.</div>
        </div>
    @endif
</div>
