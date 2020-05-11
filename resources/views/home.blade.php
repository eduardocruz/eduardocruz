@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{__('Dashboard')}} -
                        {{floor($video_minutes/60)}} horas e {{$video_minutes%60}} minutos em {{$video_count}} aulas para você ir para outro patamar profissional.
                    </div>

                    <div class="card-body">
                        {{-- __('Your application\'s dashboard.') --}}

                        <div class="col text-center">
                            <a href="https://us02web.zoom.us/j/85115327880" target="_blank" class="btn btn-primary">
                                11/04 - https://us02web.zoom.us/j/85115327880
                            </a>
                        </div>


                        @foreach($users as $user)
                            @isset($user->email)
                                <img
                                    src="{{$user->photo_url}}"
                                    class="img-thumbnail rounded-circle rounded-full w-8 h-8 mr-2 mt-2"
                                    width="100"
                                />
                            {{--
                                <span class="text-90">
                            {{ $user->name ?? $user->email ?? __('Nova User') }}
                            </span>
                            --}}
                            @endisset
                        @endforeach
                        <div class="col text-center">
                            <a href="/videos" class="btn btn-primary">Assistir Videos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
