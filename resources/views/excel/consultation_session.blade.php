<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_sessions as $consultation_session)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_session->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>