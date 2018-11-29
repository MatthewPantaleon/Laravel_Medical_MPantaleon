<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
	protected $table = 'doctors';
	
    public function visits(){
		return $this->hasMany('App\Visit');
	}
}
