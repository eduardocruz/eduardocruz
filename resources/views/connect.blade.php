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
                        <p>Se você já tem conta no Stripe =>
                            <a href="https://dashboard.stripe.com/oauth/authorize?response_type=code&client_id=ca_FaRrwPcmvdiQM9JQryYgXTxetNRy2BBI&scope=read_write">
                                <img src="/images/connect-with-stripe.png" alt="">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
