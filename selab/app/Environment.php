<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
	protected $table = 'environments';
	protected $primaryKey = 'id';
	public $timestamps = false;
	
	public function hardware(){
		return $this->hasMany('App\Hardware');
	}
}