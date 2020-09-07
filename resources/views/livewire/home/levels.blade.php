<div>
    <ul>
        @foreach($levels as $level)
            <li>{{$level->name}}</li>
            <ul>
                @foreach($level->users as $user)
                    <li>{{$user->name}}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</div>
