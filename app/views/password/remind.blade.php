@extends('layouts.master')

@section('title')

<title>Password Change</title>

@stop

@section('content')

<div class="container-fluid text-center">
	<h2>
		Enter your email to reset your password
	</h2>
	<br>
	{{ Form::open(array('action' => 'RemindersController@postRemind', 'class' => 'form-horizontal')) }}
	<div class="row">
		    <p><input placeholder="Email" autofocus="autofocus" type="email" name="email" class="col-md-4 col-md-offset-4"></p>
	</div>
	<div class="row">
		    <p><input type="submit" class="btn btn-danger btn-sm" value="Send Request"></p>
	</div>
	{{  Form::close() }}
</div>

@stop