@extends('layouts.master')

@section('title')
<title>User Options</title>
@stop

@section('content')

<div class="container">
	<div class="row">
	    <div class="col-md-6">
	        {{ Form::open(array('action' => 'UsersController@store')) }}
	        	<h3>Add New Admin</h3>
	            <div class="form-group">
	                 <label for="first_name">First Name</label>
	                 <input type="text" class="form-control" name="first_name">
	            </div>
	            <div class="form-group">
	                 <label for="last_name">Last Name</label>
	                 <input type="text" class="form-control" name="last_name">
	            </div>
	            <div class="form-group">
	                 <label for="email">Email</label>
	                 <input type="email" class="form-control" name="email">
	            </div>
	            <div class="form-group">
	                 <label for="password">Temporary Password</label>
	                 <input type="password" class="form-control" name="password">
	            </div>	            
	            <button type="submit" class="btn btn-danger">Submit</button>
	        {{ Form::close() }}
	    </div>
		<div class="col-md-6">
			<table class="table table-striped table-hover text-center">
				<h3>Current Admins</h3>
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th class="text-center">Remove Admin</th>
					</tr>
				</thead>
				@foreach ($users as $user)
					<tr>
						<td>
							{{{ $user->first_name }}}
						</td>
						<td>
							{{{ $user->last_name }}}
						</td>
						<td>
							{{{ $user->email }}}
						</td>
						<td class="text-center">
							<a href="#" class="btnDeleteUser btn btn-danger btn-sm">Delete</a>
							{{ Form::open(array('action' => array('UsersController@destroy', $user->id), 'method' => 'delete', 'class' => 'userDelete')) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>



@stop

@section('bottomscript')
<script>
	$('.btnDeleteUser').on('click', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this user?')) {
			$('.userDelete').submit();
		};
	});
</script>

@stop