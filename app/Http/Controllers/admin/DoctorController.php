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
		return view('admin/doctors/create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'postal_address' => 'required|max:6|min:6',
			'phone_number' => 'required|numeric|min:11',
			'start_date' => 'required|date',
		]);
		
		$doctor = new Doctor();
		$doctor->name = $request->input('name');
		$doctor->email = $request->input('email');
		$doctor->postal_address = $request->input('postal_address');
		$doctor->phone_number = $request->input('phone_number');
		$doctor->start_date = $request->input('start_date');
		
		$doctor->save();
		
		return redirect()->route('admin.doctors.index');
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
		$doctor = Doctor::findOrFail($id);
		
		
        return view('admin/doctors/edit')->with('doctor', $doctor);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
			
			'name' => 'required',
			'email' => 'required|email',
			'postal_address' => 'required|max:6|min:6',
			'phone_number' => 'required|numeric|min:11',
			'start_date' => 'required|date',
		]);
		
		$doctor = Doctor::findOrFail($id);
		
		$doctor->name = $request->input('name');
		$doctor->email = $request->input('email');
		$doctor->postal_address = $request->input('postal_address');
		$doctor->phone_number = $request->input('phone_number');
		$doctor->start_date = $request->input('start_date');
		
		$doctor->save();
		
		return redirect()->route('admin.doctors.index');
    }

    
    public function destroy($id)
    {
		
        $doctor = Doctor::findOrFail($id);
		
		
		Visit::where('doctor_id', $doctor->id)->delete();
		$doctor->delete();
		
		return redirect()->route('admin.doctors.index');
    }
}
