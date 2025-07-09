<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_evaluations as $consultation_evaluation)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_evaluation->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>