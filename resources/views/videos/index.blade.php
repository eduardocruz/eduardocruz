@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Videos</div>

                    <div class="card-body">
                        {{-- __('Your application\'s dashboard.') --}}
                        <div class="row">
                            @foreach($unlockedVideos as $video)
                                <div class="col-md-6">
                                    <div class="card mb-4 shadow-sm">
                                        <img src="{{$video->image_url}}" class="card-img-top" alt="...">


                                        <div class="card-body">
                                            <p class="card-text">
                                                {!! $video->summary !!}
                                            </p>
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
