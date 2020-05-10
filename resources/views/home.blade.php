@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{__('Dashboard')}}</div>

                    <div class="card-body">
                        {{-- __('Your application\'s dashboard.') --}}
                        <p>
                            <a href="https://dashboard.stripe.com/oauth/authorize?response_type=code&client_id=ca_FaRrwPcmvdiQM9JQryYgXTxetNRy2BBI&scope=read_write">
                                <img src="/images/connect-with-stripe.png" alt="">
                            </a>
                        </p>
                        @foreach($users as $user)
                            @isset($user->email)
                                <img
                                    src="https://secure.gravatar.com/avatar/{{ md5(\Illuminate\Support\Str::lower($user->email)) }}?size=64"
                                    class="img-thumbnail rounded-circle rounded-full w-8 h-8 mr-3"
                                />
                            {{--
                                <span class="text-90">
                            {{ $user->name ?? $user->email ?? __('Nova User') }}
                            </span>
                            --}}
                            @endisset


                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
