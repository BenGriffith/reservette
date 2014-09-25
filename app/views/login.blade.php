@extends('layouts.master')

@section('title')

<title>Log In</title>

@stop

@section('content')


<div class="container">
	<div class="row clearfix">
	    <div class="col-md-6 col-md-offset-3 column">
	    	{{ Form::open(array('action' => 'HomeController@doLogin')) }}
	        	<h1>Geekdom Staff <small>Log In</small></h1>
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
	        <br>
	        <a href="{{{ action('RemindersController@getRemind') }}}">Forgot password?</a>
	    </div>
	</div>
</div>

@stop