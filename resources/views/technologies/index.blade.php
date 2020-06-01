@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="card-columns">
                @foreach($technologies as $technology)
                <div class="card text-center">
                    <a href="/technologies/{{$technology->id}}">
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
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </home>
@endsection
