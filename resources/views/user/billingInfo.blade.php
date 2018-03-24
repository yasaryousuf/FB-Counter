@extends('user.master')

@section('title')
Billing Info
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
		<h2>{{__('billing.billingInfo')}}</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/my-account">{{__('billing.dashboard')}}</a>
			</li>
			<li class="active">
				<strong>{{__('billing.billingInfo')}}</strong>
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
<div class="row">
	<div class="col-md-6">
		<div class="billing-information-page">
			<div class="ibox-content">
				<form action="/my-account/billing-info" method="POST">
					{{csrf_field()}}
				<div class="billing-heading">
					<div class="row">
						<div class="col-md-12">
							<h3>{{__('billing.billingInfo')}}</h3>
							<div class="form-inline billing-label-style">
								<div class="form-group">
									<input id="home" type="radio" name="type" value="home"  
									<?php 
									if($billing && $billing->type =="home")
										{
											echo "checked";
										} 
									?>
									>
									<label for="home">{{__('billing.home')}}</label>
								</div>
								<div class="form-group">
									<input id="business" type="radio" name="type" value="business"  
									<?php 
									if($billing && $billing->type =="business")
										{
											echo "checked";
										} 
									?>
									>
									<label for="business">{{__('billing.business')}}</label>
									@if ($errors->has('type'))
										<span class="help-block text-danger">
											<strong>{{ $errors->first('type') }}</strong>
										</span>
									@endif									
								</div>
							</div>
						</div>
					</div>
				</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>{{__('billing.firstname')}}</label> <input type="text" class="form-control" name="first_name" value="{{$billing ? $billing->first_name : '' }}" >
								@if ($errors->has('first_name'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('first_name') }}</strong>
									</span>
								@endif								
							</div>
							<div class="col-md-6">
								<label>{{__('billing.lastname')}}</label> <input type="text" class="form-control" name="last_name" value="{{$billing ? $billing->last_name : '' }}" >
								@if ($errors->has('last_name'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('last_name') }}</strong>
									</span>
								@endif								
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>{{__('billing.email')}}</label> <input type="email" class="form-control" name="email" value="{{$billing ? $billing->email : '' }}" >
								@if ($errors->has('email'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif								
							</div>
							<div class="col-md-6">
								<label>{{__('billing.mobile')}}</label> <input type="cell" class="form-control" name="mobile" value="{{$billing ? $billing->mobile : '' }}" >
								@if ($errors->has('mobile'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('mobile') }}</strong>
									</span>
								@endif								
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>{{__('billing.companyAddressOne')}}</label> <input type="text" class="form-control" name="address_1" value="{{$billing ? $billing->address_1 : '' }}" >
								@if ($errors->has('address_1'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('address_1') }}</strong>
									</span>
								@endif								
							</div>
							<div class="col-md-6">
								<label>{{__('billing.companyAddresstwo')}}</label> <input type="text" class="form-control" name="address_2" value="{{$billing ? $billing->address_2 : '' }}" >
								@if ($errors->has('address_2'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('address_2') }}</strong>
									</span>
								@endif								
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>{{__('billing.city')}}</label> <input type="text" class="form-control" name="city" value="{{$billing ? $billing->city : '' }}" >
								@if ($errors->has('city'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('city') }}</strong>
									</span>
								@endif								
							</div>
							<div class="col-md-6">
								<label>{{__('billing.StateProvince')}}</label> <input type="text" class="form-control" name="state" value="{{$billing ? $billing->state : '' }}" >
								@if ($errors->has('state'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('state') }}</strong>
									</span>
								@endif								
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">							
							<div class="col-md-6">
								<label>{{__('billing.country')}}</label> 
								<div class="select-wrapper select-country">
									<select class="form-control select-style"  name="country">
										@include('user.country')
									</select>
									@if ($errors->has('country'))
										<span class="help-block text-danger">
											<strong>{{ $errors->first('country') }}</strong>
										</span>
									@endif									
								</div>
							</div>
							<div class="col-md-6">
								<label>{{__('billing.zipCode')}}</label> <input type="text" class="form-control" name="postal_code" value="{{$billing ? $billing->postal_code : '' }}" >
								@if ($errors->has('postal_code'))
									<span class="help-block text-danger">
										<strong>{{ $errors->first('postal_code') }}</strong>
									</span>
								@endif								
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary pull-right">{{__('billing.save')}}</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('braintree')
<script type="text/javascript">
	$("div.select-country select").val("{{$billing ? $billing->country : ''}}");
</script>
@endsection
@section('script')
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/dropzone.js"></script>
<script src="assets/js/jquery.fileupload-ui.js"></script>
<script src="assets/js/jquery.iframe-transport.js"></script>
<script src="assets/js/jquery.fileupload.js"></script>
<script src="assets/js/inspinia.js"></script>
<script src="assets/js/main.js"></script>
@endsection