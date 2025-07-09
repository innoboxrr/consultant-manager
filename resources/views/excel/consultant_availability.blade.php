<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultant_availabilities as $consultant_availability)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultant_availability->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>