<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class TestController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
    }

    
    public function index()
    {
		$d = Doctor::all();
		
        return view('test')->with('doctors', $d);
    }
	
	
	public function test(){
		
		return 'Test';
	}
	
	
	public function testWithPost($id){
		
		return 'Testing the post ' . $id;
	}
}
