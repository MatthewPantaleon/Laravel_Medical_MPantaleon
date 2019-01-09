<?php

use Illuminate\Database\Seeder;

use App\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$doctor1 = new Doctor();
		$doctor1->name = "Al Gore";
		$doctor1->email = "Al@Gore.com";
		$doctor1->postal_address = "123ABC";
		$doctor1->phone_number = "12345678901";
		$doctor1->start_date = "1998-05-23";
		$doctor1->save();
		
		$doctor2 = new Doctor();
		$doctor2->name = "Dr. Suess";
		$doctor2->email = "dr@suess.com";
		$doctor2->postal_address = "456DEF";
		$doctor2->phone_number = "12345678902";
		$doctor2->start_date = "1954-01-26";
		$doctor2->save();
		
		$doctor3 = new Doctor();
		$doctor3->name = "Donald Duck";
		$doctor3->email = "donald@duck.com";
		$doctor3->postal_address = "789GHI";
		$doctor3->phone_number = "12345678903";
		$doctor3->start_date = "1945-07-10";
		$doctor3->save();
    }
}
