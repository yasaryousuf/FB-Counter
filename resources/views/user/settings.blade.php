@extends('user.master') 

@section('title') 
Settings 
@endsection

@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>{{__('settings.settings')}}</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/my-account">{{__('settings.dashboard')}}</a>
			</li>
			<li class="active">
				<strong>{{__('settings.settings')}}</strong>
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
@if ($errors->any())
<script type="text/javascript">
    $(window).on('load',function(){
        $('#addPage').modal('show');
    });
</script>
@endif
	
<div class="setting-page">
	<div class="row">
		<div class="col-md-12">
			<div class="ibox-content">
				<div class="add-btn">
					<button type="button" class="btn btn-info btn-md pull-left" data-toggle="modal" data-target="#addPage" id="addPaage">{{__('settings.addPage')}}</button>
				</div>
				{{-- Add Page Modal --}}
				@include('user.addpage')

				@if (count($adPages))
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>{{__('settings.serialNo')}}</th>
								<th>{{__('settings.media')}}</th>
								<th>{{__('settings.pageName')}}</th>
								<th>{{__('settings.pageID')}}</th>
								<th>{{__('settings.actions')}}</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach($adPages as $adPage)
							<tr>
								<td>{{$i++}}. </td>
								<td>
									<span class="label label-success">{{$adPage->media}}</span>
								</td>
								<td>{{$adPage->advertise_name}}</td>
								<td id="advertise_id">{{$adPage->advertise_id}}</td>
								<td>
									<a type="button" class="btn btn-success btn-xs" title="VIEW" href="/counter/{{$adPage->advertise_name_slug}}">

										<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> {{__('settings.counter')}}
									</a>
									<button type="button" class="btn btn-warning btn-xs editButton" data-toggle="modal" data-target="#addPage" title="EDIT" id="editButton"
									    data-adpageid="{{$adPage->id}}">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> {{__('settings.edit')}}
									</button>
									<a title="DELETE" class="btn btn-danger btn-xs" href="{{url('my-account/ad-page/delete/'.$adPage->id)}}" onclick="return confirm('Are you sure to delete this ?')">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> {{__('settings.delete')}}
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				@else	
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="warning-group warning-block">
									<blockquote>{{__('settings.noPage')}}.</blockquote>
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
<!-- Edit Modal -->
@endsection

@section('script')
<script>


</script>
@endsection