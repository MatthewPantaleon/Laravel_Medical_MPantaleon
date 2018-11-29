<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

	
    protected $fillable = [
        'name', 'email', 'password',
    ];

	
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function role(){
		return $this->belongsTo('App\Role');
	}
	
	public function hasRole($role){
		return Role::where('name', $role)->first() != null && $this->role->id == Role::where('name', $role)->first()->id;
	}
}
