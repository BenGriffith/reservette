<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Room extends BaseModel {

    protected $table = 'rooms';

    public static $rules = [
	    'name' => 'required|max:100',
	    'sq_ft' => 'required|max:20',
	    'max_capacity' => 'required|max:20',
	    'has_AV' => 'required|max:2',
	    'has_table' => 'required|max:2',
	    'has_projector' => 'required|max:2',
	    'privacy' => 'required|max:20',
	    'floor' => 'required|max:20'
	];

	public function reservations()
	{
		return $this->hasMany('Reservation');
	}

}