<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultee_record_categories as $consultee_record_category)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultee_record_category->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>