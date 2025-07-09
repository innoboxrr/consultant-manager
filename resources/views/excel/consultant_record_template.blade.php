<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultant_record_templates as $consultant_record_template)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultant_record_template->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>