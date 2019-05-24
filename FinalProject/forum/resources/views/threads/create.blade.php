@extends('layouts.adminLayout')

@section('content')
<div class="container">

    <h1 class="my-5">Create New Thread</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('threads.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">...Title of New Thread...</small>
        </div>

        <div class="form-group">
            <label for="threadText">Thread Text</label>
            <input type="text" class="form-control" name="threadText" id="threadText" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">... Body of New Thread...</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection