<div class="modal fade" id="addPage" role="dialog">
	<div class="modal-dialog modal-lg">
		<form action="{{url('my-account/ad-page')}}" method="POST" id="page_form" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" id="adpage_id" name="adpage_id" value="" class="adpage_id">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1 class="modal-title">{{__('settings.facebookLikesConfig')}}</h1>
				</div>
				<div class="modal-body">
					<div class="facebook-setting">
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<div class="row">
							<div class="col-md-6">
								@if(Auth::user()->token && Auth::user()->token->accessToken)
								<div class="form-group {{ $errors->has('page_id') ? 'has-error' :'' }}">
									<label for="select_page_name">Select Your Page:</label>
									<div class="select-wrapper">
										<select class="form-control select-style" id="select_page_name" name="page_id" required>
											<option selected disabled value="0" >Please select one option</option>
											@if($pages)
												@foreach($pages as $page)
													<option value="{{$page['id']}}">{{$page['name']}}</option>
												@endforeach
											@endif
										</select>
									</div>
								</div>
								@else
								<div class="form-group has-error">
									<label for="select_page_name">Select Your Page:</label>
										<p class="text-danger">Please login with your facebook account.</p>
									<div class="select-wrapper">
										<select class="form-control select-style has-error" id="select_page_name" name="page_id" disabled>
											<option selected disabled>	Please select one option. </option>
										</select>
									</div>
								</div>	
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('image_url_1') ? 'has-error' : '' }}">
							<div class="row display-hidden">
								<div class="col-md-6">
									<div class="file-upload">
										<label for="logo_upload" class="file-upload__label form-control">Upload logo</label>
										<span class="text-danger"> {{ $errors->has('image_url_1') ? $errors->first('image_url_1') : '' }} </span>
									</div>
								</div>
								<div class="col-md-6">
									<span class="img-instraction">
										390px X 131px (width x height)
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="uploaded_logo">
										<img id="uploaded-logo" class="img-responsive img-editor" src="{{asset('image/upload3.jpg')}}" alt="">
										<h3>{{__('settings.uploadYourLogo')}}</h3>
										<div class="img-edit-btn">
											<i class="fa fa-pencil img-edit"></i>
											<i class="fa fa-times img-close"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group {{ $errors->has('image_url_2') ? 'has-error' : '' }}">
							<div class="row display-hidden">
								<div class="col-md-6">
									<div class="file-upload">
										<label for="ad-img-upload" class="file-upload__label form-control">Advertisement Image Upload</label>
										<input id="ad-img-upload" type="file" name="image_url_2" class="file-upload__input">
										<input id="logo_upload" type="file" name="image_url_1" class="file-upload__input">
										<span class="text-danger"> {{ $errors->has('image_url_2') ? $errors->first('image_url_2') : '' }} </span>
										<span class="text-danger"> {{ $errors->has('image_url_1') ? $errors->first('image_url_1') : '' }} </span>
									</div>
								</div>
								<div class="col-md-6">
									<span class="img-instraction">
										615px X 131px (width x height)
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="uploaded_advertise_img">
										<img id="uploaded-image" class="img-responsive img-editor2" src="{{asset('image/upload2.jpg')}}" alt="">
										<h3>{{__('settings.uploadYourImage')}}</h3>
										<div class="img-edit-btn img-edit-btn2">
											<i class="fa fa-pencil img-edit2"></i>
											<i class="fa fa-times img-close"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary btn-lg pull-right">{{__('settings.save')}}</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>