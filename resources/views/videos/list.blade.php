<div class="d-flex flex-wrap justify-content-center">
    @foreach($videos as $video)
        <div class="col-sm-2 col-6">
            <div class="card mb-0 shadow-sm mb-2">
                <img src="{{$video->image_url}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-outline-secondary" href="/videos/{{$video->id}}">Assistir</a>
                        </div>
                        <small class="text-muted">{{$video->duration}} mins</small>
                        @if($video->created_at > now()->subDays(7) )
                            <span class="badge badge-danger">Novo</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

        <div class="card">
            <div class="card-body text-center pb-0">
                <a href="/videos" class="h3">Todas as Aulas</a>
            </div>
            <div class="card-footer text-center">
                <small class="text-muted">
                    <a href="/videos" class="btn btn-primary btn-sm">Listar Todas</a>
                </small>
            </div>
        </div>
</div>
