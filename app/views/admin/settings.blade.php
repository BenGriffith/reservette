@extends('layouts.master')

@section('title')
<title>Settings</title>
@stop

@section('content')

<div class="container" id="sign_up">
	<div class="row">
	    <div class="col-md-6">
	        {{ Form::open(array('action' => 'UsersController@store')) }}
	        	<h1>Sign Up a New Admin</h1>
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
	                 <label for="password">Temp Password</label>
	                 <input type="password" class="form-control" name="password">
	            </div>	            
	            <button type="submit" class="btn btn-danger">Submit</button>
	        {{ Form::close() }}
	    </div>
		<div class="col-md-6" id="users">
			<table class="table table-striped table-hover text-center">
				<h1>Users</h1>
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
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
						<td>
							<a href="#" class="btnDeletePost btn btn-danger btn-sm">Delete</a>
							{{ Form::open(array('action' => array('UsersController@destroy', $user->id), 'method' => 'delete', 'class' => 'userDeletePost')) }}
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
	$('.btnDeletePost').on('click', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this user?')) {
			$('.userDeletePost').submit();
		};
	});
</script>

@stop