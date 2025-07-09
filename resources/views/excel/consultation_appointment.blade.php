<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_appointments as $consultation_appointment)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_appointment->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>