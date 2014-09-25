@extends('layouts.master')

@section('title')

<title>Conference Room Reservation @ Geekdom</title>

@stop

@section('navbar-link')

@if (!Auth::check())
<li><a href="#" data-toggle="modal" data-target="#about">What is Reservette?</a></li>
@endif

@stop

@section('content')

<div class="text-center">
	@if (Auth::check())
	<div></div>
	@else
	<h1>Welcome to <strong>Reservette!</strong></h1>
	@endif
	<h2>Reserve a Conference Room</h2>
</div>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table table-striped table-hover text-center">
				<thead>
					<tr>
						<th class="text-center">Name</th>
						<th class="text-center">Sq Ft</th>
						<th class="text-center">Capacity</th>
						<th class="text-center">AV Available</th>
						<th class="text-center">Projectors</th>
						<th class="text-center">Tables</th>
						<th class="text-center">Type</th>
						<th class="text-center">Location</th>
						<th class="text-center">Click to Reserve</th>
					</tr>
				</thead>
			@foreach ($rooms as $room)
				<tr>
					<td>
						{{{ $room->name }}}
					</td>
					<td>
						{{{ $room->sq_ft }}}
					</td>
					<td>
						{{{ $room->max_capacity }}}
					</td>
					<td>
						@if ($room->has_AV == 0)
						No
						@elseif ($room->has_AV == 1)
						Yes
						@endif
					</td>
					<td>
						@if ($room->has_projector == 0)
						No
						@elseif ($room->has_projector == 1)
						Yes
						@endif
					</td>
					<td>
						@if ($room->has_table == 0)
						No
						@elseif ($room->has_table == 1)
						Yes
						@endif
					</td>
					<td>
						{{{ $room->privacy }}}
					</td>
					<td>
						{{{ $room->floor }}}th
					</td>
					<td>
						<a href="{{{ action('ReservationsController@create', $room->id) }}}" class="btn btn-danger btn-sm">Reserve</a>
					</td>
				</tr>
			@endforeach
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="about">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="text-center">About Reservette</h3>
			</div>
			<div class="modal-body">
				<p class="text-justify">
					<strong>Reservette</strong> is an application that allows people to reserve conference room space at <a href="http://www.geekdom.com">Geekdom</a> and allow Geekdom staff to easily curate their conference room spaces.
				</p>
				<h4 class="text-center">
					<strong>Reserve</strong> a space today!
				</h4>
				<h3>How to use?</h3>
				<p>
					Find a conference room on the table that will best suit your needs for a meeting and then click the reserve button. You will be brought to form to input the title of your meeting, full name (first name and last name), email address, start time and end time, and any special requests you might have, which can be placed in the notes section.
				</p>
				<p>
					You can select the start and end time by clicking on the calendar next to the input bars. All time is stored in military time (24-hour clock), so please select the correct time for the beginning and end of your meeting.
				</p>
				<p>
					Once finished, click on the submit button, and your conference room reservation has been sent to the Geekdom staff! They will then review your requests and will inform you via email when your reservation has been accepted. Once then, the conference room will be yours to use during the time you had selected.
				</p>
				<p>
					Please be respectful to others and the space by cleaning up after yourselves and leaving the conference room the way you found it. It helps everyone and makes the community a better place to be. Thank you, and thank you for using <strong>Reservette</strong>!
				</p>
			</div>
			<div class="modal-footer">
				<p class="text-center">
					<small><strong>Reservette</strong> was built by <a href="https://github.com/BenGriffith">Ben Griffith</a> and <a href="http://omarquimbaya.com">Omar Quimbaya</a>, the two lab associates from <a href="http://www.codeup.com">Codeup</a>'s first cohort. For demo use only.</small>
				</p>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@stop