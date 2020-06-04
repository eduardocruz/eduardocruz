@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-4">

                        <div class="card text-center">
                            <img
                                src="{{$user->photo_url}}"
                                class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-2 mt-2 mx-auto
                                {{$user->status == 'success' ? 'bg-success' : null}}
                                {{$user->status == 'danger' ? 'bg-danger' : null}}
                                {{$user->status == 'warning' ? 'bg-warning' : null}}"
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
                                        @if(auth()->check() && auth()->user()->id != $user->id)
                                            <a href="/follow/{{$user->id}}" class="btn btn-primary btn-sm">Follow</a>
                                        @endif
                                    @endif

                                </p>
                                <p class="card-text text-left">.</p>
                            </div>
                        </div>
                </div>
                <div class="col-8">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h3>Top Technologies</h3>
                        <ul>
                            @foreach($user->technologies()->distinct()->get() as $technology)
                                <li>
                                    <a href="/technologies/{{$technology->id}}">
                                        {{$technology->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <h3>Checkins</h3>
                        <ul>
                            @foreach($user->checkins as $checkin)
                                <li>
                                    {{$checkin->created_at->diffForHumans()}}
                                    <a href="/technologies/{{$checkin->technology->id}}">
                                        {{$checkin->technology->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <h3>Following</h3>
                        <ul>
                            @foreach($user->followings()->get() as $following)
                                <li>
                                    <a href="/users/{{$following->id}}">
                                        {{$following->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    <h3>Followers</h3>
                    <ul>
                        @foreach($user->followers()->get() as $follower)
                            <li>
                                <a href="/users/{{$follower->id}}">
                                    {{$follower->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

        </div>
    </home>
@endsection



