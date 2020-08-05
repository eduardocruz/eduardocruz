@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container-fluid">
        <!-- Application Dashboard -->
        {{--
        <a href="https://us02web.zoom.us/j/87951985429" class="text-center">
            <h3>Zoom Meeting 03/08 20h - https://us02web.zoom.us/j/87951985429</h3>
        </a>
        --}}
        @include('videos.list')
        <div class="row">
            <div class="col-sm-7">

                @include('technologies.list')

               {{--  @include('users.list')--}}
            </div>
            <div class="col-sm-5 mt-4">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                {{--@include('events.list')--}}
            </div>
        </div>
    </div>
</home>
@endsection
