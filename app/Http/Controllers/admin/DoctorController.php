<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\Visit;
use App\Patient;

class DoctorController extends Controller
{
   
	public function __construct()
    {
        $this->middleware('checkAdmin');
    }
	
    public function index()
    {
		$doctors = Doctor::all();
        return view('admin/doctors')->with('doctors', $doctors);
    }

    
    public function create()
    {
        return 'Create a new doctor';
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //echo $id;
		$doctor = Doctor::findOrFail($id);
		$visits = Visit::all();
		$patients = Patient::all();
		
		return view('admin/showDoctor')->with(['doctor' => $doctor, 'visits' => $visits, 'patients' => $patients]);
    }

    
    public function edit($id)
    {
        echo $id;
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        echo $id;
    }
}
