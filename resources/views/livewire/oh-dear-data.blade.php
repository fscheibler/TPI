<div>
    @if($ohDearData)
        <!-- Informations globales -->



        <!-- Tuiles pour chaque vérification -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="bg-white p-4">
                <div class="text-xl font-bold mb-2">{{ $ohDearData['url'] }}</div>
                <div>État du certificat: <span class="{{ $ohDearData['summarized_check_result'] === 'failed' ? 'text-red-500' : 'text-green-500' }}">{{ $ohDearData['summarized_check_result'] }}</span></div>
                <div>Date du dernier contrôle: <span class="font-semibold">{{ $ohDearData['latest_run_date'] }}</span></div>
            </div>
            @foreach($ohDearData['checks'] as $check)
                @if($check['enabled'])
                    <div class="bg-white shadow rounded-lg p-4">
                        <div class="font-semibold text-lg mb-2">{{ $check['label'] }}</div>
                        <p>Statut : <span class="{{ $check['latest_run_result'] === 'failed' ? 'text-red-500' : 'text-green-500' }}">{{ $check['latest_run_result'] }}</span></p>
                        <p>Résumé : {{ $check['summary'] }}</p>
                        @if(isset($check['latest_run_ended_at']))
                            <p>Dernière exécution : <span class="font-semibold">{{ $check['latest_run_ended_at'] }}</span></p>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <p>Aucune donnée Oh Dear disponible pour ce projet.</p>
    @endif
</div>
