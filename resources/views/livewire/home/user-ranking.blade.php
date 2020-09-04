<div class="d-flex flex-wrap justify-content-center">
    @foreach($users as $user)
        <div class="card text-center col-sm-2 col-3 mr-2 ml-2 mb-2">
            <a href="/users/{{$user->id}}">
                <img
                    src="{{$user->photo_url}}"
                    class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-1 mt-1 mx-auto
                                {{$user->status == 'success' ? 'bg-success' : null}}
                    {{$user->status == 'danger' ? 'bg-danger' : null}}
                    {{$user->status == 'warning' ? 'bg-warning' : null}}"
                    width="90"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="{{$user->name}}"
                    alt="{{$user->name}}"
                />
                <p class="card-text mb-2"><small class="text-muted">
                        {{Str::limit(ucwords(strtolower($user->name)), 9)}}

                        ({{$user->checkins->count()}})

                    </small></p>
            </a>
        </div>
    @endforeach
</div>
