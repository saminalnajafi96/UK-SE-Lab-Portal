<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Booking extends Model
{
	protected $table = 'bookings'; // you may change this to your name table
	public $timestamps = true; // set true if you are using created_at and updated_at
	protected $primaryKey = 'id'; // the default is id

	public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}
	
	public function calendar(){
		return $this->hasOne('App\Calendar', 'id');
	}
}
