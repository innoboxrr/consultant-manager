<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultant_team_members as $consultant_team_member)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultant_team_member->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>