<?php

class Reservation extends BaseModel {

    protected $table = 'reservations';

    public static $rules = [
    	'meeting_title' => 'required|max:50',
        'full_name' => 'required|max:80',
        'email' => 'required|max:50',
    	'notes' => 'required|max:250',
    	'start_at' => 'required',
    	'end_at' => 'required'
	];

	public function room()
	{
		return $this->belongsTo('Room');
	}

}