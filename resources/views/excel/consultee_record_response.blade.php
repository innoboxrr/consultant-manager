<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultee_record_responses as $consultee_record_response)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultee_record_response->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>