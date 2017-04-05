<h2>Mostrando {{ count($tweets) }} tweets</h2>

<table class="table">
    @forelse ($tweets as $tweet)
        @if ($loop->first)
            <tr><th>id</th><th>contenido</th><th>usuario</th></tr>
        @endif

        <tr>
            <td>{{ $tweet->id }}</td><td>{{ $tweet->content }}</td><td>{{ $tweet->user->name }}</td>
        </tr>
    @empty
        <tr><th>Todavía no hay tweets</th></tr>
    @endforelse
</table>
