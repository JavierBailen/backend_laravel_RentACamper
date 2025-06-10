<table>
    <tr>
        <th>Modelo</th>
    </tr>
    @foreach ($furgonetas as $furgoneta)
        <tr>
            <td>{{ $furgoneta->modelo }}</td>
        </tr>
    @endforeach
</table>
