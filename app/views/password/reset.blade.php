@extends('layouts.master')

@section('title')

<title>Reset Password</title>

@stop

@section('content')

<div class="container">
	<div class="row clearfix">
	    <div class="col-md-6 col-md-offset-3 column">
	    	{{ Form::open(array('action' => 'RemindersController@postReset', 'role' => 'form')) }}
				<h2>Reset your password</h2>
				<div class="form-group">
			    	<input type="hidden" name="token" value="{{ $token }}">
			    	<label for="email">Email</label>
			    	<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
			    	<label for="password">New Password</label>
			    	<input type="password" name="password" class="form-control">
				</div>
				<div class="form-group">
			    	<label for="password_confirmation">Confirm Password</label>
			    	<input type="password" name="password_confirmation" class="form-control">
			    </div>
		    	<input type="submit" value="Reset" class="btn btn-danger"> <a class="btn btn-link" href="{{{ action('RoomsController@index') }}}">Cancel</a>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop