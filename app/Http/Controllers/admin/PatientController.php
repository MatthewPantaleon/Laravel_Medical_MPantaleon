<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Patient;
use App\Company;
use App\Doctor;
use App\Visit;

class PatientController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('checkAdmin');
    }
	
    public function index()
    {
		$patients = Patient::all();
		$companies = Company::all();
		
        return view('admin/patients')->with(['patients' => $patients, 'companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
		$doctors = Doctor::all();
		$visits = Visit::all();
		$companies = Company::all();
		
		return view('admin/showPatient')->with(['patient' => $patient, 'doctors' => $doctors, 'visits' => $visits, 'companies' => $companies]);
    }

   	
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
