@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container-fluid">
        <!-- Application Dashboard -->

        <a href="https://us02web.zoom.us/j/86924363618" class="text-center">
            <h3>Zoom Meeting 05/10 20h - https://us02web.zoom.us/j/86924363618</h3>
        </a>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <livewire:home.video-list />
        <div class="row">
            <div class="col-sm-8">
                <livewire:home.technology-list />
                <livewire:home.user-ranking />
            </div>
            <div class="col-sm-4">
                <livewire:home.latest-checkins />
                <livewire:home.latest-events />
            </div>
        </div>
    </div>
</home>
@endsection
