@extends('layouts.adminLayout')

@section('content')
<div class="container">

    <h1 class="my-5">Create New User</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="nick">Nick</label>
            <input type="text" class="form-control" name="nick" id="nick" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">...Nick...</small>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">...E-mail...</small>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">... Password...</small>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">... Password Confirm...</small>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="admin" aria-describedby="helpId" id="admin">
            <label class="form-check-label" for="admin">Admin</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection