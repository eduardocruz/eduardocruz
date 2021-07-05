@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container-fluid">
        <!-- Application Dashboard -->

        <a href="https://us02web.zoom.us/j/85992260489" class="text-center">
            <h3>05/07/2021 - Aula1 - Projeto Piloto Automático</h3>
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
