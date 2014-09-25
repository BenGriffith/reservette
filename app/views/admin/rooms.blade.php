@extends('layouts.master')

@section('title')
<title>Conference Room Options</title>
@stop

@section('content')

<div class="container">
	<div class="row">
	    <div class="col-md-6">
	        {{ Form::open(array('action' => 'RoomsController@store')) }}
	        	<h3>Create Room</h3>
	            <div class="form-group">
	                 <label for="name">Room Name</label>
	                 <input type="text" class="form-control" name="name">
	            </div>
	            <div class="form-group">
	                 <label for="sq_ft">Square Footage</label>
	                 <select class="form-control" name="sq_ft">
						<option value="100">100</option>
						<option value="125">125</option>
						<option value="150">150</option>
						<option value="175">175</option>
						<option value="200">200</option>
						<option value="225">225</option>
						<option value="250">250</option>
						<option value="275">275</option>
						<option value="300">300</option>
						<option value="325">325</option>
					</select>
	            </div>
	            <div class="form-group">
					<label for="max_capacity">Max Capacity</label>
					<select class="form-control" name="max_capacity">
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
						<option value="25">25</option>
					</select>
	            </div>
				<div class="form-group">
					<label for="has_AV" class="spacing">Does it have AV capabilities?</label>
					<div class="radio-inline">
						<label><input type="radio" name="has_AV" id="yes_av" value="1">Yes</label>
					</div>
					<div class="radio-inline">
						<label><input type="radio" name="has_AV" id="no_av" value="0">No</label>
					</div>
				</div>
	            <div class="form-group">
	                <label for="has_table" class="spacing">Does it have a table?</label>
	            	<div class="radio-inline">
						<label><input type="radio" name="has_table" id="yes_table" value="1">Yes</label>
					</div>
					<div class="radio-inline">
						<label><input type="radio" name="has_table" id="no_table" value="0">No</label>
					</div>
	            </div>
	            <div class="form-group">
	            	<label for="has_projector" class="spacing">Does it have a projector?</label>
					<div class="radio-inline">
						<label><input type="radio" name="has_projector" id="yes_projector" value="1">Yes</label>
					</div>
					<div class="radio-inline">
						<label><input type="radio" name="has_projector" id="no_projector" value="0">No</label>
					</div>
	            </div>
	            <div class="form-group">
					<label for="privacy">Level of Privacy</label>
					<select class="form-control" name="privacy">
						<option value="open">Open</option>
						<option value="half">Half</option>
						<option value="closed">Closed</option>
					</select>
	            </div>
	            <div class="form-group">
					<label for="floor">What floor is it located on?</label>
					<select class="form-control" name="floor">
						<option value="10">10</option>
						<option value="11">11</option>
					</select>
	            </div>           
	            <button type="submit" class="btn btn-danger">Submit</button>
	        {{ Form::close() }}
	    </div>
		<div class="col-md-6">
			<table class="table table-striped table-hover">
				<h3>Conference Rooms</h3>
				<thead>
					<tr>
						<th>Name</th>
						<th class="text-center">Location</th>
						<th class="text-center">Remove Room</th>
					</tr>
				</thead>
				@foreach ($rooms as $room)
					<tr>
						<td>
							{{{ $room->name }}}
						</td>
						<td class="text-center">
							{{{ $room->floor }}}
						</td>
						<td class="text-center">
							<a href="#" class="roomDeleteButton btn btn-danger btn-sm">Delete</a>
							{{ Form::open(array('action' => array('RoomsController@destroy', $room->id), 'method' => 'delete', 'class' => 'roomDelete')) }}
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
	$('.roomDeleteButton').on('click', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to delete this room?')) {
			$('.roomDelete').submit();
		};
	});
</script>

@stop