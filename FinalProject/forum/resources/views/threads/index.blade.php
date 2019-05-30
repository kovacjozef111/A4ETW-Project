@extends('layouts.app')


@section('content')

<div class="row card-header mainCardHeader">
    <div class="col-sm-6 mr-auto">
        <span>
            <h1 class="text-white display-1">
                Threads
            </h1>
        </span>
    </div>
    <div class="col-sm-6 offset-4 ml-auto text-right">
        <div style="display: inline-block">
            <p class="text-white">
                Total Threads: {{$allThreads->count()}}
            </p>
        </div>
        @if(null !== Auth::user())
        @if(Auth::user()->admin == true)
        <a href="{{ route('threads.create') }}">
            <div style="display: inline-block">
                <i class="far fa-plus-square fa-3x"></i>
            </div>
        </a>
        @endif
        @endif

    </div>
</div>

<div class="row card-body" id="greyCard">
    <div class="col-sm-10 offset-sm-1">
        <ul class="list-group">
            @foreach($allThreads as $thread)
            <li class="list-group-item">
                <div class="row">
                    <div class="container-fluid col-sm-12 card">
                        <div class="row card-header">
                            <div class="col-sm-6 mr-auto">
                                <span>
                                    <small class="text-white">
                                        @if(isset($thread->creator))
                                        <p class="cardSmallText">Creator: {{$thread->creator->nick}}</p>
                                        @else
                                        <p class="cardSmallText">Creator: <i>Deleted User</i> </p>
                                        @endif
                                    </small>
                                </span>
                            </div>
                            <div class="col-sm-6 offset-4 ml-auto text-right">
                                <div style="display: inline-block">
                                    <small class="text-white">
                                        <p class="cardSmallText">Responses: {{$thread->replies->count()}}</p>
                                    </small>
                                </div>
                                <a href="{{ route('threads.show', ['id'=>$thread->id]) }}" style="text-decoration:none">
                                    <div style="display: inline-block">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                </a>
                                @if(null !== Auth::user())
                                @if(Auth::user()->admin == true)
                                <a href='threads/delete/{{$thread->id}}' style="text-decoration:none">
                                    <div style="display: inline-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                </a>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col-sm-12 mr-auto">
                                <div class="card-title">
                                    <h5>{{$thread->title}}</h5>
                                </div>
                                <hr>
                                <div class="card-text">
                                    <p>{{$thread->body}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row card-footer">
                            <div class="col-sm-6 mr-auto">
                                <small class="text-white">
                                    <p class="cardSmallText">Created At: {{$thread->created_at}}</p>
                                </small>
                            </div>
                            <div class="col-sm-6 ml-auto">
                                <small class="text-white">
                                    <p class="cardSmallText text-right">Last Update: {{$thread->updated_at}}</p>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        {{ $allThreads->links() }}
    </div>
</div>
@endsection