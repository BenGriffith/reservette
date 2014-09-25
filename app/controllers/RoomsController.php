<?php

class RoomsController extends BaseController {

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
	    $this->beforeFilter('auth', array('except' => 'index'));
	}

	public function index()
	{
		$rooms = Room::all();
		return View::make('index')->with('rooms', $rooms);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$validator = Validator::make(Input::all(), Room::$rules);

		if ($validator->fails())
		{
			Session::flash('errorMessage', 'Room could not be created - see form errors');
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			$room = new Room();
			$room->name = Input::get('room_name');
			$room->sq_ft = Input::get('sq_ft');
			$room->max_capacity = Input::get('max_capacity');
			$room->has_AV = Input::get('has_AV');
			$room->has_table = Input::get('has_table');
			$room->has_projector = Input::get('has_projector');
			$room->privacy = Input::get('privacy');
			$room->floor = Input::get('floor');
			$room->save();

			Session::flash('successMessage', 'Room created successfully!');
			return Redirect::action('UsersController@index');
		}

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create posts validator
	    $validator = Validator::make(Input::all(), Room::$rules);

	    // attempt validation
	    if ($validator->fails())
	    {
	    	Session::flash('errorCreateRoomMessage', 'New room could not be created');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }
	    else
	    {
	    	// save to DB
			$room = new Room();
			$room->name = Input::get('name');
			$room->sq_ft = Input::get('sq_ft');
			$room->max_capacity = Input::get('max_capacity');
			$room->has_AV = Input::get('has_AV');
			$room->has_table = Input::get('has_table');	
			$room->has_projector = Input::get('has_projector');
			$room->privacy = Input::get('privacy');
			$room->floor = Input::get('floor');
			$room->save();
	    	Session::flash('successCreateRoomMessage', 'New room succesfully created');
			return Redirect::action('RoomsController@options');
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
		//
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
		Room::find($id)->delete();
		Session::flash('deleteRoom', 'Room successfully deleted');
		return Redirect::action('RoomsController@options');
	}

	public function options()
	{
		$rooms = Room::all();
		return View::make('admin.rooms')->with('rooms', $rooms);
	}

}