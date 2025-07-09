<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_prices as $consultation_price)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_price->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>