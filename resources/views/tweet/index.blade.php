@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                <h2>{{ count($tweets) }} tweets</h2>

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

            </div>
        </div>
    </div>
</div>
@endsection
