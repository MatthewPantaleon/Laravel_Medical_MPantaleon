<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Visit;
use App\Doctor;
use App\Patient;

class VisitController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('checkAdmin');
    }
	
	
    public function index()
    {
		$visits = Visit::all();
		$patients = Patient::all();
		$doctors = Doctor::all();
		
		
        return view('admin/visits')->with(['visits' => $visits, 'patients' => $patients, 'doctors' => $doctors]);
    }

    
    public function create()
    {
        $doctors = Doctor::all();
		$patients = Patient::all();
		
		return view('admin/visits/create')->with(['doctors' => $doctors, 'patients' => $patients]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
			'doctor' => 'required|integer',
			'patient' => 'required|integer',
			'date' => 'required|date|unique:visits,date',
			'price' => 'required|numeric',
			'duration' => 'required|numeric',
			'time' => 'required|date_format:"H:i:s"'
		]);
		
		$visit = new Visit();
		
		$visit->doctor_id = $request->input('doctor');
		$visit->patient_id = $request->input('patient');
		$visit->date = $request->input('date');
		$visit->price = $request->input('price');
		$visit->duration = $request->input('duration');
		$visit->time = $request->input('time');
		
		$visit->save();
		
        return redirect()->route('admin.visits.index');
    }

    
    public function show($id)
    {
        return redirect()->route('admin.visits.index');
    }

    
    public function edit($id)
    {
        $visit = Visit::findOrFail($id);
		
		$doctors = Doctor::all();
		$patients = Patient::all();
		
        return view('admin/visits/edit')->with(['visit' => $visit, 'doctors' => $doctors, 'patients' => $patients]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
			'doctor' => 'required|integer',
			'patient' => 'required|integer',
			'date' => 'required|date|unique:visits,date,' . $id,
			'price' => 'required|numeric',
			'duration' => 'required|numeric',
			'time' => 'required|date_format:"H:i:s"'
		]);
		
		
		$visit = Visit::findOrFail($id);
		
		$visit->doctor_id = $request->input('doctor');
		$visit->patient_id = $request->input('patient');
		$visit->date = $request->input('date');
		$visit->price = $request->input('price');
		$visit->duration = $request->input('duration');
		$visit->time = $request->input('time');
		
		$visit->save();
		
		return redirect()->route('admin.visits.index');
    }

    
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);
		$visit->delete();
		
		return redirect()->route('admin.visits.index');
    }
}
