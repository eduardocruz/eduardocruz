@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container-fluid">
        <!-- Application Dashboard -->
        {{--
        <a href="#" class="text-center">
            <h3>Nào haverá aula ao vivo nos dias 28/12/2020 e 04/01/2021</h3>
        </a>
        --}}
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
