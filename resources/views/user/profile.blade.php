@extends('user.master')
@section('title')
Profile
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
		<h2>{{__('profile.profile')}}</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/my-account">{{__('profile.dashboard')}}</a>
			</li>
			<li class="active">
				<strong>{{__('profile.profile')}}</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<br>
@if (session('message'))

<script>

    $(document).ready(function() {

    	toastr.success( "{{session('message')}}" );


    });
</script>

@endif
		<div class="profile-page">
			<div class="ibox-content">
				<form action="{{url('/my-account/profile/')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>{{__('profile.firstname')}}</label> <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" required>
								<span class="text-danger"> {{ $errors->has('first_name') ? $errors->first('first_name') : ''  }} </span>
							</div>
							<div class="col-md-6">
								<label>{{__('profile.lastname')}}</label> <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name" required>
								<span class="text-danger"> {{ $errors->has('last_name') ? $errors->first('last_name') : ''  }} </span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>{{__('profile.email')}}</label> <input type="email" class="form-control" value="{{$user->email}}" name="email" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="file-upload display-hidden">
									<label for="profile_upload" class="file-upload__label form-control"><i class="fa fa-cloud-upload"></i> {{__('profile.uploadYourProfilePicture')}}</label>
									<input id="profile_upload" class="file-upload__input" type="file" name="user_image_url">
								</div>
								<div class="uploaded_logo profile-image-uploaded">
									@if($user->image_url)
									<img id="profile-uploaded-img" class="img-responsive img-editor" src="{{asset('profile-images')}}/{{$user->image_url}}" alt="">
									@else
									<img id="profile-uploaded-img" class="img-responsive img-editor" src="{{asset('profile-images/man.png')}}" alt="">
									@endif
								</div>

									<p>{{__('profile.uploadYourImage')}}</p>
								<span class="text-danger"> {{ $errors->has('user_image_url') ? $errors->first('user_image_url') : ''  }} </span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary pull-right">{{__('profile.save')}}</button>
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