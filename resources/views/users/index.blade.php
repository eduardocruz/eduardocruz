@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="card-columns">
                @foreach($users as $user)
                <div class="card text-center">
                    <a href="/users/{{$user->id}}">
                        <img
                            src="{{$user->photo_url}}"
                            class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-2 mt-2 mx-auto"
                            width="140"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="{{$user->name}}"
                            alt="{{$user->name}}"
                        />
                        <div class="card-body">
                            <h5 class="card-title">{{$user->name}}</h5>
                            <p class="card-text text-left text-center">
                                @if(auth()->check() && auth()->user()->isFollowing($user))
                                    <a href="/unfollow/{{$user->id}}" class="btn btn-warning btn-sm">Unfollow</a>
                                @else
                                    <a href="/follow/{{$user->id}}" class="btn btn-primary btn-sm">Follow</a>
                                @endif
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </home>
@endsection
