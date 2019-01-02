<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
		$user = Auth::user();
		
		if($user->role->name == 'admin'){
			return view('admin.home');
		}else if($user->role->name == 'user'){
			return view('user.home');
		}
    }
	
}
