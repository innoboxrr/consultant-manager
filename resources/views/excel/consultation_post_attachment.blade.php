<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_post_attachments as $consultation_post_attachment)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_post_attachment->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>