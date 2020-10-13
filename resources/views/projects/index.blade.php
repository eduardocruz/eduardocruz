@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="card-columns">
                @foreach($projects as $project)
                <div class="card text-center">

                        <div class="card-body">
                            <h5 class="card-title">{{$project->name}}</h5>
                            <p>
                                {{$project->description}}
                            </p>

                            <img
                                src="{{$project->user->photo_url}}"
                                class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-1 mt-1 mx-auto
                                {{$project->user->status == 'success' ? 'bg-success' : null}}
                                {{$project->user->status == 'danger' ? 'bg-danger' : null}}
                                {{$project->user->status == 'warning' ? 'bg-warning' : null}}"
                                width="45"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="{{$project->user->name}}"
                                alt="{{$project->user->name}}"
                            />
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
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </home>
@endsection
