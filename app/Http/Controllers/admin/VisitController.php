<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Visit;
use App\Doctor;
use App\Patient;

class VisitController extends Controller
{
    
    public function index()
    {
		$visits = Visit::all();
		$patients = Patient::all();
		$doctors = Doctor::all();
		
		
        return view('admin/visits')->with(['visits' => $visits, 'patients' => $patients, 'doctors' => $doctors]);
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        
    }
}
