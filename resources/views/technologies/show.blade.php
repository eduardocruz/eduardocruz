@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-4">

                        <div class="card text-center">
                            <img
                                src="{{Storage::url($technology->image)}}"
                                class="img-thumbnail rounded  w-1 h-1 mr-2 mt-2 mx-auto"
                                width="140"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="{{$technology->name}}"
                                alt="{{$technology->name}}"
                            />
                            <div class="card-body">
                                <h5 class="card-title">{{$technology->name}}</h5>
                                {{--
                                <p class="card-text text-left text-center">
                                    @if(auth()->check() && auth()->user()->isFollowing($technology))
                                        <a href="/unfollow/{{$technology->id}}" class="btn btn-warning btn-sm">Unfollow</a>
                                    @else
                                        @if(auth()->check() && auth()->user()->id != $technology->id)
                                            <a href="/follow/{{$technology->id}}" class="btn btn-primary btn-sm">Follow</a>
                                        @endif
                                    @endif

                                </p>
                                --}}
                                <p class="card-text text-left text-center">
                                    <a href="/checkin/{{$technology->id}}" class="btn btn-primary btn-sm">I worked with {{$technology->name}} today</a>
                                </p>
                                <p class="card-text text-left">{{$technology->description}}</p>
                            </div>
                        </div>
                </div>
                <div class="col-8">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Top Users</h3>
                    <ul>
                        @foreach($technology->users as $follower)
                            <li>
                                <a href="/users/{{$follower->id}}">
                                    {{$follower->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <h3>Checkins</h3>
                    <ul>
                        @foreach($technology->checkins as $checkin)
                            <li>
                                {{$checkin->created_at->diffForHumans()}}
                                <a href="/users/{{$checkin->user->id}}">
                                    {{$checkin->user->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </home>
@endsection



