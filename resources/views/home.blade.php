@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">{{__('Dashboard')}} -
                        {{floor($video_minutes/60)}} horas e {{$video_minutes%60}} minutos em {{$video_count}} aulas para você ir para outro patamar profissional.
                    </div>

                    <div class="card-body">
                        {{-- __('Your application\'s dashboard.') --}}
{{--
                        <a href="https://us02web.zoom.us/j/88195976736">
                            <h3>Zoom Meeting 25/05 20h - https://us02web.zoom.us/j/88195976736</h3>
                        </a>
                        --}}
                        <div class="col text-center">
                            <a href="/videos" class="btn btn-primary">Assistir Videos</a>
                        </div>
{{--
                        @foreach($users as $user)
                            @isset($user->email)
                                    <img
                                        src="{{$user->photo_url}}"
                                        class="img-thumbnail rounded-circle rounded-full w-8 h-8 mr-2 mt-2"
                                        width="140"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="{{$user->name}}"
                                    />
                            {{--
                                <span class="text-90">
                            {{ $user->name ?? $user->email ?? __('Nova User') }}
                            </span>

                            @endisset
                        @endforeach
                        --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card-columns">
                    @foreach($users as $user)
                    <div class="card text-center">
                        <img
                            src="{{$user->photo_url}}"
                            class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-2 mt-2 mx-auto"
                            width="60"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="{{$user->name}}"
                            alt="{{$user->name}}"
                        />
                        <p class="card-text mb-2"><small class="text-muted">
                                {{Str::limit(ucwords(strtolower($user->name)), 12)}}
                            </small></p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-8">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h3>Events</h3>
                <ul>
                    @foreach($interactions as $interaction)
                        <li>
                            {{$interaction->created_at->diffForHumans()}}
                            <a href="/users/{{$interaction->user->id}}">
                                {{$interaction->user->name}}
                            </a>
                            {{$interaction->relation}}ed

                            <a href="/users/{{$interaction->subject->id}}">
                                {{$interaction->subject->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</home>
@endsection
