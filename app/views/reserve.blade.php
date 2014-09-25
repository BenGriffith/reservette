@extends('layouts.master')

@section('topscript')

<script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">

@stop

@section('title')

<title>Reserve {{ $room->name }}</title>

@stop

@section('content')

<div class="container">
	<div class="row clearfix">
	    <div class="col-md-6 col-md-offset-3 column">
	        {{ Form::open(array('action' => 'ReservationsController@store')) }}
	        	<h2>Reserve {{ $room->name }}</h2>
	            <div class="form-group">
	            	<input type="hidden" name="room_id" value="{{ $room->id }}">
	                <label for="meeting_title">Meeting Title</label>
	                <input type="text" class="form-control" name="meeting_title">
	            </div>
	            <div class="form-group">
	                <label for="meeting_title">Full Name</label>
	                <input type="text" class="form-control" name="full_name">
	            </div>
	            <div class="form-group">
	                <label for="meeting_title">Email</label>
	                <input type="email" class="form-control" name="email">
	            </div>
	            <div class="form-group">
	            	<label for="start_date">Start Time</label>
	                <div class='input-group date' id='datetimepicker1' data-date-format="YYYY-MM-DD HH:mm">
	                    <input type='text' class="form-control" name="start_at">
	                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	                </div>
            	</div>
            	<div class="form-group">
	            	<label for="start_date">End Time</label>
	                <div class='input-group date' id='datetimepicker2' data-date-format="YYYY-MM-DD HH:mm">
	                    <input type='text' class="form-control" name="end_at">
	                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	                </div>
            	</div>
	            <div class="form-group">
	                 <label for="notes">Notes</label>
	                 <textarea class="form-control" name="notes" id="notes" rows="4"></textarea>
	            </div>	            
	            <button type="submit" class="btn btn-danger">Submit</button> <a class="btn btn-link" href="{{{ action('RoomsController@index') }}}">Cancel</a>
	        {{ Form::close() }}
	    </div>
	</div>
</div>

@stop

@section('bottomscript')

<script>
	$(function () {
		$('#datetimepicker1').datetimepicker();
		$('#datetimepicker2').datetimepicker();
	});
</script>

@stop