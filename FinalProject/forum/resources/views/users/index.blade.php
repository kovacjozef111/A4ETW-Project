@extends('layouts.app')

@section('content')

<div class="row card-header mainCardHeader">
    <div class="col-sm-6 mr-auto">
        <span>
            <h1 class="text-white display-1">
                Users
            </h1>
        </span>
    </div>
    <div class="col-sm-6 offset-4 ml-auto text-right">
        <div style="display: inline-block">
            <p class="text-white">
                Total Users: {{$userCount}}
            </p>
        </div>
        <a href="{{ route('users.create') }}">
            <div style="display: inline-block">
                <i class="far fa-plus-square fa-3x"></i>
            </div>
        </a>
    </div>
</div>

<div class="row card-body" id="greyCard">
    <div class="col-sm-10 offset-sm-1">
        <ul class="list-group">
            @foreach($allUsers as $user)
            <li class="list-group-item">
                <div class="row">
                    <div class="container-fluid col-sm-12 card">
                        <div class="row card-header">
                            <div class="col-sm-6 mr-auto">
                                <span>
                                    <small class="text-white">
                                        <p class="cardSmallText">ID: {{$user->id}}</p>
                                    </small>
                                </span>
                            </div>
                            <div class="col-sm-6 offset-4 ml-auto text-right">
                                <div style="display: inline-block">
                                    <small class="text-white">
                                        <p class="cardSmallText">Posts: {{$user->replies->count()}}</p>
                                    </small>
                                </div>
                                <a href="{{ route('users.destroy', ['id'=>$user->id]) }}" style="text-decoration:none">
                                    <div style="display: inline-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row card-body noPadding">
                            <div class="col-sm-12 mr-auto">
                                <div class="card-text noSidesPadding">
                                    <strong style="display:inline-block">Nick: </strong>
                                    <p style="display:inline-block" class="noMargin">{{$user->nick}}</p>
                                </div>
                                <div class="card-text noSidesPadding">
                                    <strong style="display:inline-block">E-mail: </strong>
                                    <p style="display:inline-block" class="noMargin">{{$user->email}}</p>
                                </div>
                                <div class="card-text noSidesPadding">
                                    <strong style="display:inline-block">Password Hash: </strong>
                                    <p style="display:inline-block" class="noMargin">{{$user->password}}</p>
                                </div>
                                <div class="card-text noSidesPadding">
                                    <strong style="display:inline-block">Admin Privileges: </strong>
                                    <p style="display:inline-block" class="noMargin">{{$user->admin}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row card-footer">
                            <div class="col-sm-6 mr-auto">
                                <small class="text-white">
                                    <p class="cardSmallText">Created: {{$user->created_at}}</p>
                                </small>
                            </div>
                            <div class="col-sm-6 ml-auto">
                                <small class="text-white">
                                    <p class="cardSmallText text-right">Last Update: {{$user->updated_at}}</p>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        {{ $allUsers->links() }}
    </div>
</div>

@endsection