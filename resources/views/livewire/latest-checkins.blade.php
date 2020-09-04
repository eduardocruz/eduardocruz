<div>
    <ul>
        @foreach($checkins as $checkin)
            <li>
                {{$checkin->created_at->diffForHumans()}}
                <a href="/users/{{$checkin->user->id}}">
                    {{$checkin->user->name}}
                </a> worked with
                <a href="/technologies/{{$checkin->technology->id}}">
                    {{$checkin->technology->name}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
