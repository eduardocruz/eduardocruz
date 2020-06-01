@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="card-columns">
                <div class="card text-center">
                    <img
                        src="{{$user->photo_url}}"
                        class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-2 mt-2 mx-auto"
                        width="140"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="{{$user->name}}"
                        alt="{{$user->name}}"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text text-left">.</p>
                    </div>
                </div>
            </div>
        </div>
    </home>
@endsection



