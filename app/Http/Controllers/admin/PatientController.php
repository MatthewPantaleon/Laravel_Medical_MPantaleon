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
		$companies = Company::all();
		
        return view('admin.patients.create')->with('companies', $companies);
    }

    
    public function store(Request $request)
    {
		$request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:patients,email',
			'postal_address' => 'required|min:6|max:6',
			'phone_number' => 'required|regex:/[0-9]{11}/',
			'medical_insurance' => 'nullable|boolean',
			'company' => 'nullable|required_if:medical_insurance,1|integer',
			'policy_number' => 'nullable|required_if:medical_insurance,1|min:6|max:6'
		],[
			'medical_insurance.boolean' => 'Medical Insurance must be a valid Value.',
			'policy_number.required_if' => 'Policy Number is required.',
			'company.required_if' => 'Company is required.',
			'company.integer' => 'Company must be a valid value.'
		]);
		
		$patient = new Patient();
		$patient->name = $request->input('name');
		$patient->email = $request->input('email');
		$patient->postal_address = $request->input('postal_address');
		$patient->phone_number = $request->input('phone_number');

		
		if(!empty($request->input('medical_insurance'))){
			$patient->medical_insurance = $request->input('medical_insurance');
			$patient->company_id = $request->input('company');
			$patient->policy_number = $request->input('policy_number');
		}else{
			$patient->medical_insurance = 0;
		}
		
		$patient->save();
		
		return redirect()->route('admin.patients.index');
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
		$patient = Patient::findOrFail($id);
		$companies = Company::all();
		
		
        return view('admin/patients/edit')->with(['patient' => $patient, 'companies' => $companies]);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:patients,email,' .$id,
			'postal_address' => 'required|min:6|max:6',
			'phone_number' => 'required|regex:/[0-9]{11}/',
			'medical_insurance' => 'nullable|boolean',
			'company' => 'nullable|required_if:medical_insurance,1|integer',
			'policy_number' => 'nullable|required_if:medical_insurance,1|min:6|max:6'
		],[
			'medical_insurance.boolean' => 'Medical Insurance must be a valid Value.',
			'policy_number.required_if' => 'Policy Number is required.',
			'company.required_if' => 'Company is required.',
			'company.integer' => 'Caompany is must be a valid value.'
		]);
		
		$patient = Patient::findOrFail($id);
		$patient->name = $request->input('name');
		$patient->email = $request->input('email');
		$patient->postal_address = $request->input('postal_address');
		$patient->phone_number = $request->input('phone_number');

		
		if(!empty($request->input('medical_insurance'))){
			$patient->medical_insurance = $request->input('medical_insurance');
			$patient->company_id = $request->input('company');
			$patient->policy_number = $request->input('policy_number');
		}else{
			$patient->medical_insurance = 0;
			$patient->company_id = null;
			$patient->policy_number = null;
		}
		
		$patient->save();
		
		return redirect()->route('admin.patients.index');
    }

    
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
		
		Visit::where('patient_id', $patient->id)->delete();
		$patient->delete();
		
		return redirect()->route('admin.patients.index');
    }
}
