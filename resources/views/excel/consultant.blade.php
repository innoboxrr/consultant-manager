<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultants as $consultant)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultant->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>