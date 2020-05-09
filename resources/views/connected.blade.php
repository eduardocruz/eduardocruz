@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Stripe Connect</div>

                    <div class="card-body">

                        @isset($message)
                        <h3>{{$message}}</h3>
                        @endif
                        @isset($error_description)
                        <h4>{{$error_description}}</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
