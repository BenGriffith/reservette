<?php

use Carbon\Carbon;

Class BaseModel extends Eloquent {

	// Accessor to change the output of time zones
	public function getStartAtAttribute($value)
	{
		$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone(Config::get('app.localTimezone'));
	}

	public function getEndAtAttribute($value)
	{
		$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone(Config::get('app.localTimezone'));
	}

}