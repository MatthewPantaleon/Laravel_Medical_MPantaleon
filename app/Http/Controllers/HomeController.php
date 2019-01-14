<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;

class HomeController extends Controller
{
    //apply auth middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    // This makes sure if /home is typed or liinked to, HomeController makes sure that admins and users are routed to their respected home views.
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
