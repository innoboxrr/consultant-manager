<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultees as $consultee)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultee->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>