<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Environment;

class Hardware extends Model
{
	protected $table = 'hardware';
	protected $primaryKey = 'id';
	public $timestamps = false;
	
    public function environment(){
    	return $this->belongsTo('App\Environment');
    }
}
