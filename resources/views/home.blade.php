@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container-fluid">
        <!-- Application Dashboard -->
        {{--
        <a href="https://us02web.zoom.us/j/87951985429" class="text-center">
            <h3>Zoom Meeting 27/07 20h - https://us02web.zoom.us/j/87951985429</h3>
        </a>
        --}}
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($videos as $video)
                <div class="col-sm-2 col-6">
                    <div class="card mb-0 shadow-sm">
                        <img src="{{$video->image_url}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" class="btn btn-sm btn-outline-secondary" href="/videos/{{$video->id}}">Assistir</a>
                                </div>
                                <small class="text-muted">{{$video->duration}} mins</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{--
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">{{__('Dashboard')}} -
                        {{floor($video_minutes/60)}} horas e {{$video_minutes%60}} minutos em {{$video_count}} aulas para você ir para outro patamar profissional.
                    </div>



                    <div class="card-body">
                        {{-- __('Your application\'s dashboard.') --}}
{{--
                        <a href="https://us02web.zoom.us/j/86238483591">
                            <h3>Zoom Meeting 08/06 20h - https://us02web.zoom.us/j/86238483591</h3>
                        </a>
--}}
                        {{--
                        <div class="col text-center">
                            <a href="/videos" class="btn btn-primary">Assistir Videos</a>
                        </div>
                        --}}
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

                    </div>
                </div>
            </div>
        </div>
        --}}
        <div class="row">
            <div class="col-sm-7">

                <div class="d-flex flex-wrap justify-content-center">
                    @foreach($technologies as $technology)
                        <div class="card text-center mr- col-sm-2 col-3 ml-2 mr-2 mb-2 mt-4">
                            <a href="/technologies/{{$technology->id}}">
                                <img
                                    src="{{Storage::url($technology->image)}}"
                                    class="img-thumbnail  rounded  w-1 h-1 mr-2 mt-2 mx-auto"
                                    width="90"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{$technology->name}}"
                                    alt="{{$technology->name}}"
                                />
                                <p class="card-text mb-2"><small class="text-muted">
                                        {{Str::limit(ucwords(strtolower($technology->name)), 12)}}
                                    </small></p>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex flex-wrap justify-content-center">
                    @foreach($users as $user)
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
            <div class="col-sm-5 mt-4">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                    <ul>
                        @foreach($checkins as $checkin)
                            <li>
                                {{$checkin->created_at->diffForHumans()}}
                                <a href="/users/{{$checkin->user->id}}">
                                    {{$checkin->user->name}}
                                </a> worked with
                                <a href="/technologies/{{$checkin->technology->id}}">
                                    {{$checkin->technology->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
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
