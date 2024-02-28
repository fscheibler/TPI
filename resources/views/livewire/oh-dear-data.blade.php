<div>
    @if($ohDearData)
        <div>URL: {{ $ohDearData['url'] }}</div>
        <div>État du certificat: {{ $ohDearData['summarized_check_result'] }}</div>
        <div>Date du dernier contrôle: {{ $ohDearData['latest_run_date'] }}</div>
        @foreach($ohDearData['checks'] as $check)
            @if($check['enabled'])
                <div>
                    <p>{{ $check['type'] }} : {{ $check['latest_run_result'] }}</p>
                    <p>Résumé: {{ $check['summary'] }}</p>
                </div>
            @endif
        @endforeach
    @else
        <p>Aucune donnée Oh Dear disponible pour ce projet.</p>
    @endif
</div>
