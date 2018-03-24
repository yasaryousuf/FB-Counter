<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Order Form</title>
        <link href="{{asset('general/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('general/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('general/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('general/css/responsive.css')}}" rel="stylesheet">
        
    </head>
    <body>
        <!-- Order page design markup-->
        <div class="order-page">
            <div class="container">
                <div class="order-page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="order-page-logo">
                                <img src="{{asset('general/images/logo.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="back-home text-right">
                                <a href="{{url('/')}}"><i class="fa fa-home"></i> <i class="fa fa-long-arrow-left"></i>Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="order-page-inner">
                    <h2><span>Wait for a secound.</span> Secure payment process. Our server does not touch your payment information.</h2>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">                                    
                        <form action="{{ url('/subscribe') }}" method="post" >
                            <div class="billing-info">
                                @if($plan)
                                <div class="panel panel-default">
                                    {{-- <div class="panel-heading">Pay with </div> --}}
                                    <div class="panel-body">
                                        <div id="dropin-container"></div>
                                        <input type="hidden" name="plan" value="{{ $plan->id }}">
                                        {{ csrf_field() }}
                                        <button id="payment-button" class="order-button" type="submit">Place Order</button>
                                    </div>
                                </div>
                            </div>
                            <div class="query-displayed">
                                <div class="billing-sidebar billing-sidebar-display-btn">
                                    <div class="billing-summary">
                                        <h4><i class="fa fa-shopping-cart"></i>Cart summary <span>Edit</span></h4>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8">
                                                <div class="cart-description">
                                                    <h5>1 x Maker The Agency Theme</h5>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quidem!
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="cart-price text-right">
                                                    $50.00
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="total-price text-right">
                                                    <h5><span>Sub total: </span>$150.22</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="payment-button" class="order-button billing-sidebar-display-btn" type="submit">Place Order</button>
                            </div>
                        </form>
                            
                            @endif
                        </div>
                        <div class="col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0">
                            <div class="billing-sidebar">
                                <div class="billing-summary">
                                    <h4><i class="fa fa-shopping-cart"></i>Cart summary <span>Edit</span></h4>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8">
                                            <div class="cart-description">
                                                <h5>1 x Maker The Agency Theme</h5>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quidem!
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="cart-price text-right">
                                                $50.00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="total-price text-right">
                                                <h5><span>Sub total: </span>$150.22</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              
            
            <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Expiration Date</label>
                        <select name="" id="" class="form-control">
                            <option selected value=''> Select Month </option>
                            <option value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="" sr-only>Year</label>
                        <select name="" id="" class="form-control">
                            <option selected value="">2016</option>
                            <option value="">2017</option>
                            <option value="">2018</option>
                            <option value="">2019</option>
                            <option value="">2020</option>
                            <option value="">2021</option>
                            <option value="">2022</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="">Security Code</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>-->
            
            
            {{--                             <div class="form-group">
                <div class="pay-card">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="card-name form-inline">
                                <input type="checkbox" id="paypal">
                                <label for="paypal" class="check-control">Paypal</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="card-images text-right">
                                <img src="{{asset('/general/images/paypal.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{--                         <p class="tmc">By clicking the button, you agree <a href="">Terms and Condition</a></p>
        
        <button type="button" class="order-button">Place Order</button> --}}
        <script src="{{asset('general/js/jquery.min.js')}}"></script> 
        <script src="{{asset('general/js/bootstrap.min.js')}}"></script>
        <script src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>
        <script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script>
        <script>
            jQuery(function ($) {

                jQuery(document).ready(function(){
        $.ajax({
            url: '{{ url('braintree/token') }}'
        })

        .done(function (response) {
            braintree.setup(response.data.token, 'custom', {
            id: 'dropin-container',
            card: {
                cardholderName: true
              },
            onReady: function () {
                $('#payment-button').removeClass('hidden');
            }
        });

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
    });
            });
        </script>
    </body>
</html>