<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Signup extends BaseModel {

    protected $table = 'users';

    public static $rules = [
	    'first_name' => 'required|max:20',
	    'last_name' => 'required|max:20',
	    'email' => 'required|max:30',
	    'password' => 'required|max:100'
	];

}