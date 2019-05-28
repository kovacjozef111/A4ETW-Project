@extends('layouts.app')

@section('content')
<div class="container createForm">

    <h1 class="my-3">Create New Thread</h1>
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

    <form action="{{ route('threads.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">...Title of New Thread...</small>
        </div>

        <div class="form-group">
            <label for="threadText">Thread Text</label>
            <textarea type="text" class="form-control" name="threadText" id="threadText" aria-describedby="helpId" placeholder="" rows="5"></textarea>
            <small id="helpId" class="form-text text-muted">... Body of New Thread...</small>
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</div>
@endsection