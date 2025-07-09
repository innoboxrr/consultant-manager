<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_chat_messages as $consultation_chat_message)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_chat_message->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>