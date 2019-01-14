<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Patient;
use App\Company;
use App\Doctor;

class PatientController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('checkUser');
    }
	
	//other controller functions are not here because the user does not need them. As they can only view patietnts and a single patient.
	
    public function index()
    {
		$patients = Patient::all();
		$companies = Company::all();
		
        return view('user/patients')->with(['patients' => $patients, 'companies' => $companies]);
    }
	
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
		$companies = Company::all();
		$doctors = Doctor::all();
		
		return view('user/showPatient')->with(['patient' => $patient, 'companies' => $companies, 'doctors' => $doctors]);
    }
}
