@extends('layouts.app')

@section('content')
<div class="container createForm">

    <h1 class="my-3">Create New User</h1>
    <hr>
    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.store') }}" method="post" id="createUserForm">
        @csrf

        <div class="form-group">
            <label for="nick">Nick</label>
            <input type="text" class="form-control" name="nick" id="nick" aria-describedby="helpId" placeholder="Nick...">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="E-mail...">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="helpId" placeholder="Password...">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" aria-describedby="helpId" placeholder="Confirm Password...">
        </div>

        <div class="form-row marginBottomLight">
            <div class="col">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="admin" aria-describedby="helpId" id="admin">
                    <label class="form-check-label" for="admin">Admin</label>
                </div>
            </div>
            <div class="text-right pull-right col">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection