<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultee_records as $consultee_record)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultee_record->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>