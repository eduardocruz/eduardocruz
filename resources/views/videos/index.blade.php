@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h1>Videos</h1>
                        {{floor($video_minutes/60)}} horas e {{$video_minutes%60}} minutos em {{$video_count}} aulas para você ir para outro patamar profissional.
                    </div>

                    <div class="card-body">
                        {{-- __('Your application\'s dashboard.') --}}
                        <div class="row">
                            @foreach($unlockedVideos as $video)
                                <div class="col-md-6">
                                    <div class="card mb-4 shadow-sm">
                                        <a type="button" class="btn btn-sm btn-outline-secondary" href="/videos/{{$video->id}}">
                                        <img src="{{$video->image_url}}" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text">
                                                {!! $video->summary !!}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                @forelse($video->users()->orderBy('created_at', 'desc')->get()->take(7) as $user)
                                                    <img
                                                        src="{{$user->photo_url}}"
                                                        class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-1 mt-1 mx-auto
                                {{$user->status == 'success' ? 'bg-success' : null}}
                                                        {{$user->status == 'danger' ? 'bg-danger' : null}}
                                                        {{$user->status == 'warning' ? 'bg-warning' : null}}"
                                                        width="45"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="{{$user->name}}"
                                                        alt="{{$user->name}}"
                                                    />
                                                @empty
                                                    Seja o primeiro a assistir
                                                @endforelse
                                                    @if($video->created_at > now()->subDays(7) )
                                                        <span class="badge badge-danger">Novo</span>
                                                    @endif
                                                <small class="text-muted">{{$video->duration}} mins</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @foreach($lockedVideos as $video)
                                <div class="col-md-6">
                                    <div class="card mb-4 shadow-sm">
                                        <img src="https://eduardocruz.nyc3.cdn.digitaloceanspaces.com/devremoto/lives/em_breve.jpeg" class="card-img-top" alt="...">


                                        <div class="card-body">
                                            <p class="card-text">
                                                {{ $video->summary}}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a type="button" class="btn btn-sm btn-outline-secondary" href="#">Em Breve</a>
                                                </div>
                                                <small class="text-muted">{{$video->duration}} mins</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
