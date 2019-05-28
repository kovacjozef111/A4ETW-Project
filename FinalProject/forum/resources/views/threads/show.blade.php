@extends('layouts.app')


@section('content')

<div class="row card-header mainCardHeader">
    <a href="{{ route('threads.index') }}">
        <i class="fas fa-chevron-circle-left fa-3x"></i>
    </a>
    <h1 class="display-5 text-white paddingLeft">Thread:</h1>
    <div class="col-sm-12 mr-auto mainThreadText">
        <div class="container-fluid col-sm-12 card">
            <div class="row card-header">
                <div class="col-sm-6 mr-auto">
                    <span>
                        <small class="text-white">
                            <p class="cardSmallText">Creator: {{$thread->creator->nick}}</p>
                        </small>
                    </span>
                </div>
                <div class="col-sm-6 offset-4 ml-auto text-right">
                    <div style="display: inline-block">
                        <small class="text-white">
                            <p class="cardSmallText">Responses: {{$thread->replies->count()}}</p>
                        </small>
                    </div>
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
</div>

<div class="row card-body" id="greyCard">
    <div class="col-sm-10 offset-sm-2">
        <h1 class="display-5">Replies:</h1>
        <ul class="list-group">
            @foreach($allReplies as $reply)
            <li class="list-group-item noPadding">
                <div class="row">
                    <div class="container-fluid col-sm-12 card">
                        <div class="row card-header">
                            <div class="col-sm-6 mr-auto">
                                <span>
                                    <small class="text-white">
                                        @if(isset($reply->creator))
                                        <p class="cardSmallText">Creator: {{$thread->creator->nick}}</p>
                                        @else
                                        <p class="cardSmallText">Creator: <i>Deleted User</i> </p>
                                        @endif
                                    </small>
                                </span>
                            </div>
                            <div class="col-sm-6 offset-4 ml-auto text-right">
                                <a href="{{ route('replies.destroy', ['reply'=>$reply]) }}" style="text-decoration:none">
                                    <div style="display: inline-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col-sm-12 mr-auto">
                                <div class="card-text">
                                    <p>{{$reply->body}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row card-footer">
                            <div class="col-sm-6 mr-auto">
                                <small class="text-white">
                                    <p class="cardSmallText">Created At: {{$reply->created_at}}</p>
                                </small>
                            </div>
                            <div class="col-sm-6 ml-auto">
                                <small class="text-white">
                                    <p class="cardSmallText text-right">Last Update: {{$reply->updated_at}}</p>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        {{ $allReplies->links() }}
    </div>
</div>

<div class="row card-footer">
    <div class="col-sm-10 offset-1">
        <form action="{{ route('replies.store', ['thread'=>$thread]) }}" method="post">
            @csrf

            <h1 class="display-5 text-white">
                Post Your Reply:
            </h1>

            <div class="form-group">
                <textarea type="text" class="form-control" name="replyText" id="replyText" aria-describedby="helpId" placeholder="" rows="5"></textarea>
                <small id="helpId" class="form-text text-muted">... Text Of New Reply ...</small>
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection