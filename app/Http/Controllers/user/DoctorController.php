<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Patient;
use App\Doctor;
use App\Visit;

class DoctorController extends Controller
{
    //applying middleware
	public function __construct()
    {
        $this->middleware('checkUser');
    }
	
	
	//other controller functions are not here because the user does not need them. As they can only view doctors and a single doctor.
	
    public function index()
    {
		$doctors = Doctor::all();
        return view('user/doctors')->with('doctors', $doctors);
    }
    
    public function show($id)
    {
        //echo $id;
		$doctor = Doctor::findOrFail($id);
		$visits = Visit::all();
		$patients = Patient::all();
		
		return view('user/showDoctor')->with(['doctor' => $doctor, 'visits' => $visits, 'patients' => $patients]);
    }
}
