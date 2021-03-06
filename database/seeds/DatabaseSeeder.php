<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
		$this->call(VisitsTableSeeder::class);
    }
}
