<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_advices as $consultation_advice)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_advice->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>