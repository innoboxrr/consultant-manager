<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultee_record_items as $consultee_record_item)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultee_record_item->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>