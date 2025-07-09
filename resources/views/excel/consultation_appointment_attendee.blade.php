<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_appointment_attendees as $consultation_appointment_attendee)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_appointment_attendee->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>