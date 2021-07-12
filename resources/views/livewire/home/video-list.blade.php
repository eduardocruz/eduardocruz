<div class="d-flex flex-wrap justify-content-center">
    @foreach($videos as $video)
        <div class="col-sm-2 col-6">
            <div class="card mb-0 shadow-sm mb-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="/videos/{{$video->id}}">
                    <img src="{{$video->image_url}}" class="card-img-top" alt="...">
                </a>
                <div class="card-body pb-2 pt-2 pl-2 pr-2">
                    <div class="d-flex justify-content-between align-items-center">
                        {{--
                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-outline-secondary" href="/videos/{{$video->id}}">
                                Assistir</a>
                        </div>
                        <small class="text-muted">{{$video->duration}} mins</small>
                        --}}
                        @if(in_array($video->id, [79, 80]))
                            Exclusivo do plano Anual
                        @else
                            @forelse($video->users()->orderBy('user_video.created_at', 'desc')->get()->take(3) as $user)
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
                        @endif
                        
                        @if(in_array($video->id, [79, 80]))
                            <span class="badge badge-success">Anual</span>
                        @elseif($video->created_at > now()->subDays(7) )
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
