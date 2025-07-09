<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($consultation_posts as $consultation_post)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $consultation_post->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>