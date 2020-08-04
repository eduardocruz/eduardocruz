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
                                <a href="/toggle/watch/{{$video->id}}" class="btn btn-warning btn-lg">Marcar como não assistido</a>
                            @else
                                <a href="/toggle/watch/{{$video->id}}" class="btn btn-primary btn-lg">Marcar aula como assistida</a>
                            @endif
                        </p>
                        <hr>
                        {!! $video->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
