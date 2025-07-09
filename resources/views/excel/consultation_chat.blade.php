<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_chats as $consultation_chat)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_chat->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>