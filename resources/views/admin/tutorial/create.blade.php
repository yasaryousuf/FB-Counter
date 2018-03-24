@extends('admin.master')
@section('title')
Admin : Create Tutorial
@endsection
@section('body')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Create Tutorial</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/admin/tutorial">Tutorials</a>
			</li>
			<li class="active">
				<strong>Create</strong>
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
<!-- Tutorial Page MarkUp Start-->
<div class="tutorial">
	<div class="row">
		<div class="col-md-6">
			<div class="ibox-content">
				<div class="tinymce-active">
					<form action="/admin/tutorial" method="POST">
						{{csrf_field()}}
						<div class="form-group {{ $errors->has('first_name') ? 'has-error' :'' }}">
							<h1>Title</h1>
							<input type="text" class="form-control" name="post_title" required>
							@if ($errors->has('post_title'))
								<span class="help-block text-danger">
									<strong>{{ $errors->first('post_title') }}</strong>
								</span>
							@endif
							<span class="url-link">your url: <a href="" target="_blank">http://counter.linkingphase.com/admin/tutorial</a></span>
						</div>
						<textarea id="summernote" name="post_content" required> </textarea>
							@if ($errors->has('post_content'))
								<span class="help-block text-danger">
									<strong>{{ $errors->first('post_content') }}</strong>
								</span>
							@endif						
						<button class="btn btn-primary" type="submit">Save</button>
					</form>
				</div>				
			</div>
		</div>
	</div>
</div><!-- tutorial page ending tag-->
@endsection
@section('script')
		<script>
			$('#summernote').summernote({
				height: 300,                 
			    minHeight: null,             
			    maxHeight: null,             
			    focus: true   
			});
		</script>
@endsection