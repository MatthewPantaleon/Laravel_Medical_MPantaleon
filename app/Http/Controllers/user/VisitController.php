<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Visit;
use App\Doctor;
use App\Patient;

class VisitController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('checkUser');
    }
	
    public function index()
    {
		$visits = Visit::all();
		$patients = Patient::all();
		$doctors = Doctor::all();
		
		
        return view('user/visits')->with(['visits' => $visits, 'patients' => $patients, 'doctors' => $doctors]);
    }
	
	public function create(){
		
		return 'Create a new visit for users';
	}
}
