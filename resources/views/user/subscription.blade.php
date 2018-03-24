@extends('user.master')

@section('title')
Subscription
@endsection

@section('style')
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/inspinai.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">
@endsection

@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Subscription</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/my-account">Account</a>
			</li>
			<li class="active">
				<strong>Subscription</strong>
			</li>
		</ol>
	</div>
</div>
<br>

@if (session('message'))

<script>

    $(document).ready(function() {

    	toastr.success( "{{session('message')}}" );


    });
</script>

@endif
@php
	$subscription = DB::table('subscriptions')->where('user_id', Auth::id()	)->orderBy('updated_at', 'desc')->first();
	$currentPlan =  $subscription->braintree_plan;
@endphp
<div class="subscription-pricing">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox-content">
				<div class="row">
					<div class="col-sm-12">
						<div class="text-center">
							@if($status)
								@if((Auth::user()->is('Admin') || Auth::user()->is('Member')) && !$subscription->ends_at)
									<button type="button" class="btn btn-w-m btn-danger cancel-alert btn-lg"> <i class="fa fa-times fa-lg"></i> <small>Cancel Subscription!</small></button>
								@endif
							@endif
							@if($subscription->ends_at)
									<h1>Subscription ends at:  {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subscription->ends_at)->format('d-m-Y') }} </h1>
							@endif
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-3 col-md-offset-1">
						<div class="single-price {{ $currentPlan == 'pzwb' ? 'current-plan' :'' }}">
							<ul class="price">
								<li class="header">Basic</li>
								<li class="grey">$ 9.99 / year</li>
								<li>10GB Storage</li>
								<li>10 Emails</li>
								<li>10 Domains</li>
								<li>1GB Bandwidth</li>
								<li class="grey"><a id="" class="button change_plan" href="/my-account/subscription/change/pzwb"><span class="normal-pln">Plan</span> </a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="single-price {{ $currentPlan == '7t8m' ? 'current-plan' :'' }}">
							<ul class="price">
								<li class="header">Pro</li>
								<li class="grey">$ 9.99 / year</li>
								<li>10GB Storage</li>
								<li>10 Emails</li>
								<li>10 Domains</li>
								<li>1GB Bandwidth</li>
								<li class="grey"><a id="" class="button change_plan" href="/my-account/subscription/change/7t8m"><span class="normal-pln">Plan</span> <span class="current-pln">Current Plan</span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="single-price {{ $currentPlan == '93j2' ? 'current-plan' :'' }}">
							<ul class="price">
								<li class="header">Advance</li>
								<li class="grey">$ 9.99 / year</li>
								<li>10GB Storage</li>
								<li>10 Emails</li>
								<li>10 Domains</li>
								<li>1GB Bandwidth</li>
								<li class="grey"><a id="" class="button change_plan" href="/my-account/subscription/change/93j2"><span class="normal-pln">Plan</span> <span class="current-pln">Current Plan</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="subcription-page text-center">
			<div class="ibox-content">
				<h2>Current Subscription $12 per year <strong>{{$status}}</strong></h2>
				<div class="setting-buttons">
					<?php 
					 	$now_datetime = date('Y-m-d H:i:s');
						$subscription = DB::table('subscriptions')->where('user_id', Auth::id()	)->orderBy('updated_at', 'desc')->first();
						if($status):
							$ends_at_datetime = $subscription->ends_at;
							if((Auth::user()->is('Admin') || Auth::user()->is('Member')) && !$ends_at_datetime):
								?>
							<button type="button" class="btn btn-w-m btn-danger cancel-alert"> <i class="fa fa-times fa-lg"></i> Cancel</button>
						<?php elseif((Auth::user()->is('Admin') || Auth::user()->is('Member')) && $ends_at_datetime && ($now_datetime < $ends_at_datetime)): ?>
							<button type="button" class="btn btn-w-m btn-warning active-alert">Resume</button>
							
						<?php elseif((Auth::user()->is('Admin') || Auth::user()->is('Member')) && $ends_at_datetime && ($now_datetime > $ends_at_datetime)): ?>
							<a href="/order-form" class="btn btn-info"><i class="fa fa-credit-card"></i> Pay with card</a>
						<?php endif; ?>
					<?php else: ?>
						<a href="/order-form" class="btn btn-info"><i class="fa fa-credit-card"></i> Pay with card</a>
					<?php endif; ?>
				</div>
				<div class="billing-table">
					<h3>Billing History</h3>
					<table class="table-bordered text-center">
						<thead>
							<tr>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Package</th>
								<th>Amount</th>
								<th class="hidden-action">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>2 February, 2018</td>
								<td>2 February, 2000</td>
								<td>VIP Package</td>
								<td>$120</td>
								<td class="hidden-action"><a href="" class="billing-send-btn" data-toggle="tooltip" data-placement="bottom" title="Send invoice"><i class="fa fa-send"></i></a></td>
							</tr>
							<tr>
								<td>2 February, 2018</td>
								<td>2 February, 2000</td>
								<td>VIP Package</td>
								<td>$120</td>
								<td class="hidden-action"><a href="" class="billing-send-btn" data-toggle="tooltip" data-placement="bottom" title="Send invoice"><i class="fa fa-send"></i></a></td>
							</tr>
							<tr>
								<td>2 February, 2018</td>
								<td>2 February, 2000</td>
								<td>VIP Package</td>
								<td>$120</td>
								<td class="hidden-action"><a href="" class="billing-send-btn" data-toggle="tooltip" data-placement="bottom" title="Send invoice"><i class="fa fa-send"></i></a></td>
							</tr>
							<tr>
								<td>2 February, 2018</td>
								<td>2 February, 2000</td>
								<td>VIP Package</td>
								<td>$120</td>
								<td class="hidden-action"><a href="" class="billing-send-btn" data-toggle="tooltip" data-placement="bottom" title="Send invoice"><i class="fa fa-send"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('script')
<script type="text/javascript">
    $('.change_plan').on('click', function(){
        var href = $(this).attr('href');
        console.log(href);

        swal({
            title: "Are you sure?",
            type: "warning",
			icon: "warning",
			buttons: false,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, change plan!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true,
			dangerMode: true,
		// })
		// 	.then((change) => {

		// 		if(change) {
		// 			window.location.href = 'www.google.com';
		// 		}
		// 	});
    	 	},
    	     function (isConfirm) {
    	         if (isConfirm) {
    	             window.location.href = href;
                }
            });

        // return false;
   });
</script>
@endsection