@extends('layouts.adminLayout')

@section('content')
<ul class="list-group">
    @foreach($allThreads as $thread)
    <li class="list-group-item">
        <div class="row">
            <div class="container-fluid col-sm-12 card border-success">
                <div class="row card-header border-success">
                    <div class="col-sm-6 mr-auto">
                        <span>
                            <small class="text-success">Založil: {{$thread->creator->nick}}</small>
                        </span>
                    </div>
                    <div class="col-sm-6 offset-4 ml-auto">
                        <div style="display: inline-block">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>
                <div class="row card-body">
                    <div class="col-sm-12 mr-auto">
                        <div class="card-title">
                            <h5>{{$thread->title}}</h5>
                        </div>
                        <div class="card-text">
                            <p>{{$thread->body}}</p>
                        </div>
                    </div>
                </div>
                <div class="row card-footer border-success">
                    <div class="col-sm-6 mr-auto">
                        <small>
                            <p>Vložené: {{$thread->created_at}}</p>
                        </small>
                    </div>
                    <div class="col-sm-6 ml-auto">
                        <small>
                            <p>Posledná zmena: {{$thread->updated_at}}</p>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>

@endsection