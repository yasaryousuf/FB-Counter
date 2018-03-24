@extends('admin.master')
@section('title')
Admin Dashboard
@endsection
@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>User Table</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/my-account">Dashboard</a>
			</li>
			<li class="active">
				<strong>user table</strong>
			</li>
		</ol>
	</div>
</div>
<br> 

<div class="user-table">
	<div class="row">
		<div class="col-md-6">
			<div class="ibox-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Registration Date</th>
							<th>Last Login</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($users)
						@foreach($users as $user)
						<tr>
							<td>{{$user->first_name}}</td>
							<td>{{$user->last_name}}</td>
							<td>{{$user->email}}</td>
							<td>
								@foreach (\App\User::find($user->id)->roles as $role) 
                            		{{$role->name}}
                           		 @endforeach 
                        	</td>
							<td>
								{{\Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->toDayDateTimeString()}}
							</td>
							
							<td>
								@if($user->login_at)
								{{\Carbon\Carbon::createFromTimeStamp(strtotime($user->login_at))->diffForHumans()}}
								@else
								No Data
								@endif
							</td>
							<td class="tbl-action">
								<a href="/admin/log-in-as-user/{{$user->id}}">
									<i class="fa fa-eye"></i>
								</a>
								<i class="tbl-action-delete fa fa-trash-o"></i>
							</td>
						</tr>
						@endforeach
						@else
						<div class="alert alert-info">
							NO USER FOUND!!
						</div>
						@endif
					</tbody>
				</table>
				{{ $users->links() }}
			</div>
		</div>
	</div>
</div>












{{-- Mark up texts goes here --}}
@endsection

