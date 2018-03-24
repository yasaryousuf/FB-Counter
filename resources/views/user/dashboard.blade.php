@extends('user.master')
@section('title')
Dashboard
@endsection
@section('style')

@endsection
@section('body')
@if (session('message'))

<script>

    $(document).ready(function() {

    	toastr.success( "{{session('message')}}" );


    });
</script>

@endif
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-md-6">
		<div class="ibox-content">
			<div class="counter-custome-dasboard">

				<div class="row">
					@if (!Auth::user()->isSubscriber())
						<?php
							if (!$CounterFacebook->hasUserToken() || $CounterFacebook->hasUserTokenExpired() || !$CounterFacebook->hasPermissions(['email', 'pages_show_list'])): 
						?>
						<div class="warning-group warning-block">
							<blockquote>You need to integrate your Facebook accouont. </blockquote>
						</div>
						<a href=" <?=htmlspecialchars($loginUrl);?> " class="btn btn-primary" ><i class="fa fa-facebook-square fa-lg"></i> Log in!</a> <br><br>
						<?php
							endif;
							if (!Auth::user()->page):
						?>
						<div class="warning-group warning-block">
							<blockquote>Provide your page information.</blockquote>
						</div>
						<button type="button" class="btn btn-info btn-md pull-left" data-toggle="modal" data-target="#addPage" id="addPaage">Add a page</button>
						<?php
							endif;
						?>
					@else
					<div class="error-group error-block">
						<blockquote>Provide your card information <a href="/order-form" class="btn btn-link">here</a></blockquote>
					</div>
					@endif
					{{--  --}}
					@if($adpages->first())
					<div class="table-responsive">
						<table class="table table-bordered table-striped text-center">
							<thead>
								<tr>
									<th class="text-center">Name</th>
									<th class="text-center">Media</th>
									<th class="text-center">Total Likes</th>
									<th class="text-center">Link</th>
								</tr>
							</thead>
							<tbody>
								@foreach($adpages as $adpage)
								<tr>
									<td class="text-left">
										{{$adpage->advertise_name}}
									</td>
									<td>
										<span class="label label-success">
											{{$adpage->media}}
										</span>
									</td>
									{{-- @if(Auth::user()->token || !$CounterFacebook->getPermissions()) --}}
									@if( $CounterFacebook->hasPermissions(['email', 'pages_show_list']) != false )
										<td>
											{{$CounterFacebook->getLikes($adpage->advertise_id)}}  
										</td>								
									@else
										<td class="bg-danger">
											Authorize your facebook account
										</td>
									@endif
									<td> 
										<a href="/counter/{{$adpage->advertise_name_slug}}">
											<i class="fa fa-hand-pointer-o click-icon"></i>
										</a> 
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@else
					<br>
					<br>
					<br>
					<div class="alert alert-info">
						You haven't provided page details yet.
					</div>
					@endif
					@include('user.addpage')
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')

@endsection