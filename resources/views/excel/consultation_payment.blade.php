<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_payments as $consultation_payment)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_payment->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>