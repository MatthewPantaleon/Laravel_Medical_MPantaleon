<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Doctor;
use App\Patient;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$company1 = new Company();
		$company1->name = "VHI";
		$company1->save();
		
		$company1 = new Company();
		$company1->name = "Herbalife";
		$company1->save();
    }
}
