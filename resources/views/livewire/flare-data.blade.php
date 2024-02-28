<div>
    @if(!empty($flareData) && count($flareData) > 0)
        <table>
            <thead>
            <tr>
                <th>Message d'erreur</th>
                <th>Date de la première occurrence</th>
                <th>Date de la dernière occurrence</th>
                <th>Fichier</th>
                <th>Ligne</th>
                <th>Point d'entrée</th>
            </tr>
            </thead>
            <tbody>
            @foreach($flareData as $error)
                <tr>
                    <td>{{ $error['exception_message'] }}</td>
                    <td>{{ $error['first_seen_at'] }}</td>
                    <td>{{ $error['last_seen_at'] }}</td>
                    <td>{{ $error['file'] }}</td>
                    <td>{{ $error['line_number'] }}</td>
                    <td>{{ $error['entry_point'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div>Tout va bien du côté de Flare, aucune erreur non résolue.</div>
    @endif
</div>
