@extends('user.master')

@section('title')
Company Info.
@endsection

@section('style')
<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/inspinai.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/responsive.css')}}" rel="stylesheet">
@endsection

@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Company</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/my-account">Account</a>
			</li>
			<li class="active">
				<strong>Company Info.</strong>
			</li>
		</ol>
	</div>
</div>
<br>

<div class="row">
	<div class="col-md-6">
@if (session('message'))

<script>

    $(document).ready(function() {

    	toastr.success( "{{session('message')}}" );


    });
</script>

@endif
		<div class="company-page">
			<div class="ibox-content">
				<form action="{{url('/my-account/company-info/')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Company Name</label> <input type="text" class="form-control" name="company_name" value="{{$company ? $company->name : '' }}" >
						<span class="text-danger"> {{ $errors->has('company_name') ? $errors->first('company_name') : ''  }} </span>
					</div>
					<div class="col-md-6">
						<label>Company Address</label> <input type="text" class="form-control" name="company_address_one" value="{{$company ? $company->address_one : '' }}" >
						<span class="text-danger"> {{ $errors->has('company_address_one') ? $errors->first('company_address_one') : ''  }} </span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Company Address 2</label> <input type="text" class="form-control" name="company_address_two" value="{{$company ? $company->address_two : '' }}" >
						<span class="text-danger"> {{ $errors->has('company_address_two') ? $errors->first('company_address_two') : ''  }} </span>
					</div>
					<div class="col-md-6">
						<label>Company Website</label> <input type="text" class="form-control" name="company_website" value="{{$company ? $company->website : '' }}" >
						<span class="text-danger"> {{ $errors->has('company_website') ? $errors->first('company_website') : ''  }} </span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>City</label> <input type="text" class="form-control" name="company_city" value="{{$company ? $company->city : '' }}"  >
						<span class="text-danger"> {{ $errors->has('company_city') ? $errors->first('company_city') : ''  }} </span>
					</div>
					<div class="col-md-6">
						<label>State</label> <input type="text" class="form-control" name="company_state" value="{{$company ? $company->state : '' }}"  >
						<span class="text-danger"> {{ $errors->has('company_state') ? $errors->first('company_state') : ''  }} </span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">					
					<div class="col-md-6">
						<label>Country</label> 
						<div class="select-wrapper">
							<select class="form-control select-style">
								@include('user.country')
							</select>
						</div>
						<span class="text-danger"> {{ $errors->has('company_country') ? $errors->first('company_country') : ''  }} </span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary pull-right">Save</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div> <!-- profile page ending tag-->
</div>
</div>
@endsection

@section('script')
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/js/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('admin/js/dropzone.js')}}"></script>
        <script src="{{asset('admin/js/jquery.fileupload-ui.js')}}"></script>
        <script src="{{asset('admin/js/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('admin/js/jquery.fileupload.js')}}"></script>
        <script src="{{asset('admin/js/inspinia.js')}}"></script>
        <script src="{{asset('admin/js/main.js')}}"></script>
@endsection