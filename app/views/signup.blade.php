@extends('layouts.master')

@section('title')

<title>Sign Up</title>

@stop

@section('content')

<div class="container">
	<div class="row clearfix">
	    <div class="col-md-6 col-md-offset-3 column">
	        {{ Form::open(array('action' => 'SignupController@store')) }}
	        	<h1>Sign Up</h1>
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
	                 <label for="password">Password</label>
	                 <input type="password" class="form-control" name="password">
	            </div>	            
	            <button type="submit" class="btn btn-danger">Submit</button> <a class="btn btn-link" href="{{{ action('RoomsController@index') }}}">Cancel</a>
	        {{ Form::close() }}
	    </div>
	</div>
</div>

@stop