@extends('admin.master')
@section('title')
Admin : Tutorial List
@endsection
@section('body')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Tutorials</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/admin/dashboard">Admin Dashboard</a>
			</li>
			<li class="active">
				<strong>Tutorials</strong>
			</li>
		</ol>
	</div>
</div>
<br> 
@if (session('message'))

<script>

    $(document).ready(function() {

    	toastr.warning( "{{session('message')}}" );


    });
</script>

@endif
<div class="tutorial-list-page">
	<div class="row">
		<div class="col-md-6">
			<div class="ibox-content">
				<div class="tutorial-list-table">
					<a class="btn btn-primary pull-right add-tutorial-btn" href="/admin/tutorial/create">Add Tutorial</a>
					<table class="table table-bordered table-stripe">
						<thead>
							<tr>
								<th>SL</th>
								<th>Title</th>
								<th>Created Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($posts)
							@php
							$i = 0;
							@endphp
							@foreach($posts as $post)
							<tr>
								<td>{{++$i}}</td>
								<td><a href="/tutorial/{{$post->post_slug}}">{{$post->post_title}}</a></td>
								<td class="text-center">{{$post->created_at->toDayDateTimeString() }}</td>
								<td class="text-center table-icon">
									<a href="/admin/tutorial/edit/{{$post->id}}" title="EDIT" class="tutorial-edit">
										<i class="fa fa-pencil tb-edit-btn"></i> 
									</a>
									<a href="/admin/tutorial/delete/{{$post->id}}" title="DELETE" class="tutorial-delete">
										<i class="fa fa-times tb-close-btn"></i>
									</a>	
								</td>
							</tr>
							@endforeach
							@else
							<div class="alert alert-info">
								No Tutorials Found.
							</div>
							@endif
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
    $('.tutorial-delete').on('click', function(){
        var href = $(this).attr('href');
        console.log(href);

        swal({
            title: "Are you sure?",
            type: "warning",
			icon: "warning",
			buttons: false,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
            function (isConfirm) {
                if (isConfirm) {
                    window.location.href = href;
                }
            });

        return false;
   });
</script>
@endsection