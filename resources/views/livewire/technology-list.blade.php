{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

<div class="row">
    <div class="card-deck mb-2">
        @foreach($technologies as $technology)
            <div class="card">
                <div class="card-body text-center pb-0">
                    <a href="/technologies/{{$technology->id}}">
                        <img
                            src="{{Storage::url($technology->image)}}"
                            class="img-thumbnail  rounded  w-1 mr-2 mt-2 h-50"
                            width="90"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="{{$technology->name}}"
                            alt="{{$technology->name}}"
                        />

                        <p class="card-text">{{$technology->name}}</p>
                    </a>
                </div>
                <div class="card-footer text-center">
                    <small class="text-muted">
                        <a href="/checkin/{{$technology->id}}" class="btn btn-primary btn-sm">Checkin</a>
                    </small>
                </div>
            </div>
        @endforeach
        <div class="card">
            <div class="card-body text-center pb-0">
                <a href="/technologies" class="h4">Listar Todas</a>
            </div>
            <div class="card-footer text-center">
                <small class="text-muted">
                    <a href="/technologies" class="btn btn-primary btn-sm">Listar Todas</a>
                </small>
            </div>
        </div>

    </div>

</div>

{{--

        <div class="card">
    <div class="card-body text-center pb-0">
        <img
            src="https://placehold.co/90"
            class="img-thumbnail  rounded  w-1 mr-2 mt-2 h-50"
            width="90"
            data-toggle="tooltip"
            data-placement="top"
        />

        <p class="card-text">Listar Todas</p>
    </div>
    <div class="card-footer text-center">
        <small class="text-muted">
            <a href="/technologies" class="btn btn-primary btn-sm">Listar todas</a>
        </small>
    </div>
</div>
--}}
{{--
<div class="d-flex flex-wrap justify-content-center">
    @foreach($technologies as $technology)
        <div class="card card-body h-100 text-center mr- col-sm-2 col-3 ml-2 mr-2 mb-2 mt-4">
                <a href="/technologies/{{$technology->id}}">
                    <img
                        src="{{Storage::url($technology->image)}}"
                        class="img-thumbnail  rounded  w-1 mr-2 mt-2 h-50"
                        width="90"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="{{$technology->name}}"
                        alt="{{$technology->name}}"
                    />
                    <p class="card-text mb-2"><small class="text-muted">
                            {{Str::limit(ucwords(strtolower($technology->name)), 12)}}
                        </small></p>
                    <p class="card-text text-left text-center  mx-auto">
                        <a href="/checkin/{{$technology->id}}" class="btn btn-primary btn-sm">Checkin</a>
                    </p>
                </a>
        </div>
        <div class="card-footer text-center">
            <small class="text-muted">
                <a href="/checkin/{{$technology->id}}" class="btn btn-primary btn-sm">Checkin!</a>
            </small>
        </div>
    @endforeach
</div>
--}}



