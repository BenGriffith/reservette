@extends('layouts.master')

@section('topscript')

	<script src="/js/jquery.tablesorter.min.js"></script>

@stop

@section('title')

<title>Reservation Requests</title>

@stop

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-hover text-center tablesorter" id="ReservationTable">
				<thead>
					<tr>
						<th class="text-center clickable">Room Name</th>
						<th class="text-center clickable">Meeting Title</th>
						<th class="text-center clickable">Full Name</th>
						<th class="text-center clickable">Email</th>
						<th class="text-center clickable">Starts</th>
						<th class="text-center clickable">Ends</th>
						<th class="text-center clickable">Notes</th>
						<th class="text-center clickable">Status</th>
						<th class="text-center clickable">Accept or Deny</th>
					</tr>
				</thead>
				@foreach ($reservations as $reservation)
				<tr>
					<td>
						{{{ $reservation->room->name }}}
					</td>
					<td>
						{{{ $reservation->meeting_title }}}
					</td>
					<td>
						{{{ $reservation->full_name }}}
					</td>
					<td>
						{{{ $reservation->email }}}
					</td>
					<td>
						{{{ $reservation->start_at->format("M j, Y @ h:i A") }}}
					</td>
					<td>
						{{{ $reservation->end_at->format("M j, Y @ h:i A") }}}
					</td>
					<td>
						{{{ $reservation->notes }}}
					</td>
					<td>
						@if ($reservation->status == 0)
						On hold
						@elseif ($reservation->status == 1)
						Reserved
						@endif
					</td>
					<td>
						<a href="#" data-id="{{{ $reservation->id }}}" class="btn btn-primary btn-sm btnAcceptReservation">Accept</a> <a href="#" data-id="{{{ $reservation->id }}}" class="btn btn-danger btn-sm btnDeleteReservation">Deny</a>
						{{ Form::open(array('action' => array('ReservationsController@approveReservation', $reservation->id), 'method' => 'POST', 'id' => 'formAccept-' . $reservation->id)) }}
						{{ Form::close() }}

						{{ Form::open(array('action' => array('ReservationsController@destroy', $reservation->id), 'method' => 'DELETE', 'id' => 'formDelete-' . $reservation->id)) }}
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

	$('.btnAcceptReservation').on('click', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to accept this reservation?')) {
			var id = $(this).data('id');
			$('#formAccept-' + id).submit();
		};
	});

	$('.btnDeleteReservation').on('click', function(e) {
		e.preventDefault();
		if (confirm('Are you sure you want to remove this request?')) {
			var id = $(this).data('id');
			$('#formDelete-' + id).submit();
		};
	});

	$(document).ready(function() 
    { 
        $("#ReservationTable").tablesorter(); 
    } 
); 

</script>

@stop