<div>
    <h3>Events</h3>
    <ul>
        @foreach($interactions as $interaction)
            <li>
                {{$interaction->created_at->diffForHumans()}}
                <a href="/users/{{$interaction->user->id}}">
                    {{$interaction->user->name}}
                </a>
                {{$interaction->relation}}ed

                <a href="/users/{{$interaction->subject->id}}">
                    {{$interaction->subject->name}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
