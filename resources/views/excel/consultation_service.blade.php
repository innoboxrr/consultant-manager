<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_services as $consultation_service)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_service->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>