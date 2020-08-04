@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card card-default">
                    <div class="card-header">{{$video->title}}</div>

                    <div class="card-body text-center">
                        {{-- __('Your application\'s dashboard.') --}}
                        <video
                            id="my-player"
                            class="video-js"
                            controls
                            preload="auto"
                            width="80%"
                            poster="{{$video->image_url}}"
                            data-setup='{}'>
                            <source src="{{$video->video_url}}" type="video/mp4"></source>
                            <p class="vjs-no-js huge">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">
                                    supports HTML5 video
                                </a>
                            </p>
                        </video>
                        <p class="card-text text-left text-center">
                            @if(auth()->user()->videos->contains($video))
                                <a href="/toggle/watch/{{$video->id}}" class="btn btn-warning btn-lg">Marcar aula como não assistido</a>
                            @else
                                <a href="/toggle/watch/{{$video->id}}" class="btn btn-primary btn-lg">Marcar aula como assistida</a>
                            @endif
                        </p>
                        <hr>
                        {!! $video->description !!}
                    </div>
                    <h3>Assistiram essa aula:</h3>
                    <div class="d-flex flex-wrap justify-content-center">

                        @foreach($video->users as $user)
                            <div class="card text-center col-sm-2 col-3 mr-2 ml-2 mb-2">
                                <a href="/users/{{$user->id}}">
                                    <img
                                        src="{{$user->photo_url}}"
                                        class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-1 mt-1 mx-auto
                                {{$user->status == 'success' ? 'bg-success' : null}}
                                        {{$user->status == 'danger' ? 'bg-danger' : null}}
                                        {{$user->status == 'warning' ? 'bg-warning' : null}}"
                                        width="90"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{$user->name}}"
                                        alt="{{$user->name}}"
                                    />
                                    <p class="card-text mb-2"><small class="text-muted">
                                            {{Str::limit(ucwords(strtolower($user->name)), 9)}}

                                            ({{$user->checkins->count()}})

                                        </small></p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
