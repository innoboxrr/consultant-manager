<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_intake_forms as $consultation_intake_form)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_intake_form->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>