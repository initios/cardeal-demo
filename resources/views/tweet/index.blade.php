<h2>Mostrando {{ count($tweets) }} tweets</h2>

<table class="table">
    @forelse ($tweets as $tweet)
        @if ($loop->first)
            <tr>
                <th>{{ $tweet->id }}</th><th>{{ $tweet->content }}</th>
            </tr>
        @endif

    @empty
        <tr><th>Todavía no hay tweets</th></tr>
    @endforelse
</table>
