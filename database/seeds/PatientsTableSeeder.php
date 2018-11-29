<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Doctor;
use App\Patient;
use App\Company;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$patient1 = new Patient();
		$patient1->name = "Kyle Reed";
		$patient1->email = "Kyle@Reed.com";
		$patient1->postal_address = "7H6G54";
		$patient1->phone_number = "65436578976";
		$patient1->medical_insurance = true;
		$patient1->company_id = Company::where('name', 'VHI')->first()->id;
		$patient1->policy_number = "1GH34";
		$patient1->save();
		
		$patient2 = new Patient();
		$patient2->name = "Johnny Guitar";
		$patient2->email = "johnny@guitar.com";
		$patient2->postal_address = "3QWOP4";
		$patient2->phone_number = "6512358976";
		$patient2->medical_insurance = false;
		$patient2->company_id = null;
		$patient2->policy_number = null;
		$patient2->save();
		
		$patient3 = new Patient();
		$patient3->name = "Danny Phantom";
		$patient3->email = "danny@phantom.com";
		$patient3->postal_address = "7H6G54";
		$patient3->phone_number = "6548475976";
		$patient3->medical_insurance = false;
		$patient3->company_id = null;
		$patient3->policy_number = null;
		$patient3->save();
		
		$patient4 = new Patient();
		$patient4->name = "Carl Boone";
		$patient4->email = "carl@boone.com";
		$patient4->postal_address = "7H85H7";
		$patient4->phone_number = "6548475988";
		$patient4->medical_insurance = true;
		$patient4->company_id = Company::where('name', 'Herbalife')->first()->id;
		$patient4->policy_number = "1GH70";
		$patient4->save();
    }
}
