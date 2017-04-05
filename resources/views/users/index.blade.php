<h1>Tweets de {{ $user->name }}</h1>
<h2>Mis datos</h2>
<p>Email {{ $user->email }}</p>

<h2>{{ $user->tweets->count() }} tweets</h2>
<table class="table">
    @forelse ($user->tweets->all() as $tweet)
        @if ($loop->first)
            <tr><th>id</th><th>contenido</th></tr>
        @endif

        <tr>
            <td>{{ $tweet->id }}</td><td>{{ $tweet->content }}</td>
        </tr>
    @empty
        <tr><th>Todavía no hay tweets</th></tr>
    @endforelse
</table>
