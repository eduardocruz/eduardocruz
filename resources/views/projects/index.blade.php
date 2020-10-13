@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="card-columns">
                @foreach($projects as $project)
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>
                        <p>
                            {{$project->description}}
                        </p>
                        <i class="fab fa-fw text-left fa-btn fa-github"></i>
                        <i class="fab fa-fw text-left fa-btn fa-bitbucket"></i>
                        <i class="fab fa-fw text-left fa-btn fa-gitlab"></i>
                        <p>
                            <a href="{{$project->code_repository}}" target="_blank">
                                {{$project->code_repository}}
                            </a>
                        </p>
                        <i class="fas fa-fw text-left fa-btn fa-link"></i>
                        <p>
                            <a href="{{$project->url}}" target="_blank">
                                {{$project->url}}
                            </a>
                        </p>
                        <img
                            src="{{$project->user->photo_url}}"
                            class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-1 mt-1 mx-auto
                            {{$project->user->status == 'success' ? 'bg-success' : null}}
                            {{$project->user->status == 'danger' ? 'bg-danger' : null}}
                            {{$project->user->status == 'warning' ? 'bg-warning' : null}}"
                            width="45"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="{{$project->user->name}}"
                            alt="{{$project->user->name}}"
                        />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </home>
@endsection
