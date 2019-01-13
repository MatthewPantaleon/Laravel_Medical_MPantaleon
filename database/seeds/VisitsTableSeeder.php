<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Doctor;
use App\Visit;
use App\Patient;

class VisitsTableSeeder extends Seeder
{
    /*		Table Reference
	
     		$table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
			$table->date('date');
			$table->time('time');
			$table->integer('duration');
			$table->double('price', 15, 2);
            $table->timestamps();
     */
    public function run()
    {
		$visit1 = new Visit();
		$visit1->doctor_id = Doctor::where('email', 'Al@Gore.com')->first()->id;
		$visit1->patient_id = Patient::where('email', 'Kyle@Reed.com')->first()->id;
		$visit1->date = '2017-05-20';
		$visit1->time = '12:00';
		$visit1->duration = 30;
		$visit1->price = 65.00;
		$visit1->save();
		
		$visit1 = new Visit();
		$visit1->doctor_id = Doctor::where('email', 'Al@Gore.com')->first()->id;
		$visit1->patient_id = Patient::where('email', 'danny@phantom.com')->first()->id;
		$visit1->date = '2017-05-22';
		$visit1->time = '12:00';
		$visit1->duration = 30;
		$visit1->price = 65.00;
		$visit1->save();
		
		$visit1 = new Visit();
		$visit1->doctor_id = Doctor::where('email', 'dr@suess.com')->first()->id;
		$visit1->patient_id = Patient::where('email', 'carl@boone.com')->first()->id;
		$visit1->date = '2017-05-22';
		$visit1->time = '12:00';
		$visit1->duration = 30;
		$visit1->price = 65.00;
		$visit1->save();
		
    }
}
