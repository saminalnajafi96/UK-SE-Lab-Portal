<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
	protected $table = 'calendar';
	protected $primaryKey = 'id';
	public $timestamps = false;
	
	public function booking(){
		return $this->hasOne('App\Booking');
	}
}
