<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	protected $table = 'patients';
    
	public function company(){
		return $this->belongsTo('App\Company');
	}
	
	public function visits(){
		return $this->hasMany('App\Visit');
	}
}
