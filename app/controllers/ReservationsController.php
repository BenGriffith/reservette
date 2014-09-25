<?php

class ReservationsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth', array('except' => array('index','create','show','store')));
	}

	public function index()
	{
		return Redirect::action('RoomsController@index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($room_id)
	{
		$room = Room::findOrFail($room_id);
		$query = Room::orderBy('name', 'asc');
		return View::make('reserve')->with('room', $room);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Reservation::$rules);

		if ($validator->fails())
		{
			Session::flash('errorMessage', 'Reservation could not be created - see form errors');
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			$reservation = new Reservation();
			$reservation->room_id = Input::get('room_id');
			$reservation->status = 0;
			$reservation->meeting_title = Input::get('meeting_title');
			$reservation->full_name = Input::get('full_name');
			$reservation->email = Input::get('email');
			$reservation->start_at = Input::get('start_at');
			$reservation->end_at = Input::get('end_at');
			$reservation->notes = Input::get('notes');
			$reservation->save();

			Session::flash('successMessage', 'Room reserved successfully!');
			return Redirect::action('RoomsController@index');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$reservation = Reservation::findOrFail($id);
		return View::make('reserve')->with('reservation', $reservation);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$delete = Reservation::find($id);

		if ($delete == null) 
		{
			Session::flash('errorMessage', 'Reservation did not delete because it does not exist.');
		}
		else
		{
			Reservation::find($id)->delete();
			Session::flash('successMessage', 'Uh oh! Someone is not happy. That reservation is gone!');
		}
		return Redirect::action('AdminController@index');
	}

	public function approveReservation($id) 
	{
		$reservation = Reservation::findOrFail($id);
		$reservation->status = 1;
		$reservation->save();
		return Redirect::action('AdminController@index');
	}

}