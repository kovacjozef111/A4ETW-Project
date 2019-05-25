@extends('layouts.adminLayout')

@section('content')
<ul class="list-group">
    @foreach($allUsers as $user)
    <li class="list-group-item">{{ $user->id }} {{ $user->nick }} {{ $user->password }} {{ $user->admin }}
        {{ $user->email }} {{ $user->created_at }} {{ $user->updated_at }}
    </li>
    <hr>
    @endforeach
</ul>
@endsection