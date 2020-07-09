@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container-fluid">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-sm-3">
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
                <div class="col-sm-9">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

            <div class="col-sm-12">
                <h3>Top Users</h3>
            </div>
            <div class="d-flex flex-wrap">
                @if(!empty($topUser))
                <div class="col-sm-3">
                    <div class="card text-center">
                        <a href="/users/{{$topUser->id}}">
                            <img
                                src="{{$topUser->photo_url}}"
                                class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-2 mt-2 mx-auto
                                {{$topUser->status == 'success' ? 'bg-success' : null}}
                                {{$topUser->status == 'danger' ? 'bg-danger' : null}}
                                {{$topUser->status == 'warning' ? 'bg-warning' : null}}"
                                width="160"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="{{$topUser->name}}"
                                alt="{{$topUser->name}}"
                            />
                            <p class="card-text mb-1">
                                    {{Str::limit(ucwords(strtolower($topUser->name)), 12)}} ({{$topUser->checkins()->where('technology_id', $technology->id)->count()}})
                                </p>
                            <div class="progress ml-2 mr-2 mb-1">
                                @if($topUser->checkins()->where('technology_id', $technology->id)->count() > 30)
                                    <div class="progress-bar" role="progressbar" style="width: {{(100*($topUser->checkins()->where('technology_id', $technology->id)->count()-30))/60}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">{{$topUser->checkins()->where('technology_id', $technology->id)->count()-30}}/60</div>
                                @else
                                    <div class="progress-bar" role="progressbar" style="width: {{(100*$topUser->checkins()->where('technology_id', $technology->id)->count())/30}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">{{$topUser->checkins()->where('technology_id', $technology->id)->count()}}/30</div>
                                @endif
                            </div>

                            <div class="progress ml-2 mr-2 mb-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </a>
                    </div>
                </div>
                @endif
                <div class="col-sm-9">
                    <div class="d-flex flex-wrap">
                        @foreach($users as $user)
                            @if($user->id != $topUser->id)

                                    <div class="card text-center col-sm-3 col-5 ml-1 mr-1 mb-2 mt-0">
                                        <a href="/users/{{$user->id}}">
                                            <img
                                                src="{{$user->photo_url}}"
                                                class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-2 mt-2 mx-auto
                                    {{$user->status == 'success' ? 'bg-success' : null}}
                                                {{$user->status == 'danger' ? 'bg-danger' : null}}
                                                {{$user->status == 'warning' ? 'bg-warning' : null}}"
                                                width="60"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{$user->name}}"
                                                alt="{{$user->name}}"
                                            />
                                            <p class="card-text mb-1"><small class="text-muted">
                                                    {{Str::limit(ucwords(strtolower($user->name)), 12)}} ({{$user->checkins()->where('technology_id', $technology->id)->count()}})
                                                </small></p>
                                            <div class="progress ml-0 mr-0 mb-1">
                                                @if($user->checkins()->where('technology_id', $technology->id)->count() > 30)
                                                    <div class="progress-bar" role="progressbar" style="width: {{(100*($user->checkins()->where('technology_id', $technology->id)->count()-30))/60}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">{{$user->checkins()->where('technology_id', $technology->id)->count()-30}}/60</div>
                                                @else
                                                    <div class="progress-bar" role="progressbar" style="width: {{(100*$user->checkins()->where('technology_id', $technology->id)->count())/30}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">{{$user->checkins()->where('technology_id', $technology->id)->count()}}/30</div>
                                                @endif
                                            </div>

                                            <div class="progress ml-0 mr-0 mb-3">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </a>
                                    </div>

                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <h3>Checkins</h3>
            <ul>
                @foreach($technology->checkins()->orderBy('created_at', 'desc')->get() as $checkin)
                    <li>
                        {{$checkin->created_at->diffForHumans()}}
                        <a href="/users/{{$checkin->user->id}}">
                            {{$checkin->user->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </home>
@endsection



