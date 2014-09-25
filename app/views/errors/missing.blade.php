@extends('layouts.master')

@section('content')

<div class="container text-center" id="error-missing">
	<h1>404</h1>
	<h2>This page does not exist.</h2>
	<a href="{{{ action('RoomsController@index') }}}" class="btn btn-danger">Go back home!</a>
</div>

@stop