@extends('user.master')

@section('title')
Show Plans 
@endsection
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $plan->name }}</div>
                    <div class="panel-body">
                        <form action="{{ url('/subscribe') }}" method="post" >
                            <div id="dropin-container"></div>
                            <input type="hidden" name="plan" value="{{ $plan->id }}">
                            {{ csrf_field() }}
                            <hr>
                            <button id="payment-button" class="btn btn-primary btn-flat hidden" type="submit">Pay now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('braintree')
<script src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>
{{-- <script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script> --}}
    <script>
        $.ajax({
            url: '{{ url('braintree/token') }}'
        })
        .done(function (response) {
            // braintree.setup(response.data.token, 'custom', {
            //     id: 'dropin-container',
            //     // card: {
            //     //     cardholderName: true
            //     //   },
            //     onReady: function () {
            //         //$('#payment-button').removeClass('hidden');
            //     }
            // });
            braintree.setup(response.data.token, 'dropin', {
                container: 'dropin-container',
                card: {
                    cardholderName: true
                  },
                  
                onReady: function () {
                    $('#payment-button').removeClass('hidden');
                }
            });
        });
    </script>
@endsection