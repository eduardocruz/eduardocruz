@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-sm-4">

                        <div class="card text-center">
                            <img
                                src="{{$user->photo_url}}"
                                class="img-thumbnail rounded-circle rounded-full w-1 h-1 mr-2 mt-2 mx-auto
                                {{$user->status == 'success' ? 'bg-success' : null}}
                                {{$user->status == 'danger' ? 'bg-danger' : null}}
                                {{$user->status == 'warning' ? 'bg-warning' : null}}"
                                width="140"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="{{$user->name}}"
                                alt="{{$user->name}}"
                            />
                            <div class="card-body">
                                <h5 class="card-title">{{$user->name}}</h5>
                                <p class="card-text text-left text-center">
                                    @if(auth()->check() && auth()->user()->isFollowing($user))
                                        <a href="/unfollow/{{$user->id}}" class="btn btn-warning btn-sm">Unfollow</a>
                                    @else
                                        @if(auth()->check() && auth()->user()->id != $user->id)
                                            <a href="/follow/{{$user->id}}" class="btn btn-primary btn-sm">Follow</a>
                                        @endif
                                    @endif

                                </p>
                                <p class="card-text text-left">.</p>
                                {{--
                                <div id="cal-heatmap"></div>

                                <script type="text/javascript">
                                    var cal = new CalHeatMap();
                                    cal.init({
                                        domain: "month",
                                        subDomain: "x_day",
                                        subDomainTextFormat: "%d",
                                        cellSize: 40,
                                        range: 1,
                                    });
                                </script>
                                --}}
                            </div>
                        </div>
                </div>
                <div class="col-sm-8">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-2 text-center">
                            @if($user->max_checkins() > 30 && $user->max_checkins() <= 60)
                                <img src="/img/level2.png" alt="" class="mx-auto">
                                <p class=""><small>Level 2</small></p>
                            @else
                                <img src="/img/level1.png" alt="" class="mx-auto">
                                <p class=""><small>Level 1</small></p>
                            @endif
                        </div>
                        <div class="col-sm-10">

                            @foreach($user->technologies()->distinct()->get() as $technology)

                                <a href="/technologies/{{$technology->id}}" class="ml-2">
                                    {{$technology->name}}
                                </a>

                                <div class="progress ml-2 mr-0 mb-1 ">
                                    @if($user->checkins()->where('technology_id', $technology->id)->count() > 30)
                                        <div class="progress-bar" role="progressbar" style="width: {{(100*($user->checkins()->where('technology_id', $technology->id)->count()-30))/60}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">{{$user->checkins()->where('technology_id', $technology->id)->count()-30}}/60</div>
                                    @else
                                        <div class="progress-bar" role="progressbar" style="width: {{(100*$user->checkins()->where('technology_id', $technology->id)->count())/30}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">{{$user->checkins()->where('technology_id', $technology->id)->count()}}/30</div>
                                    @endif
                                </div>
                            @endforeach

                            <div class="progress ml-2 mr-0 mb-3 mt-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>





                        <h3>Checkins</h3>
                        <ul>
                            @foreach($user->checkins()->orderBy('created_at', 'desc')->get() as $checkin)
                                <li>
                                    {{$checkin->created_at->diffForHumans()}}
                                    <a href="/technologies/{{$checkin->technology->id}}">
                                        {{$checkin->technology->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <h3>Following</h3>
                        <ul>
                            @foreach($user->followings()->get() as $following)
                                <li>
                                    <a href="/users/{{$following->id}}">
                                        {{$following->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    <h3>Followers</h3>
                    <ul>
                        @foreach($user->followers()->get() as $follower)
                            <li>
                                <a href="/users/{{$follower->id}}">
                                    {{$follower->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>


                </div>
            </div>

        </div>
    </home>
@endsection

@push('scripts')
    <script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />
@endpush


