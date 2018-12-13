<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    
	
	
	
    public function index()
    {
        return 'this is the user doctors';
    }
    
    public function show($id)
    {
        return 'The id is ' . $id;
    }
}
