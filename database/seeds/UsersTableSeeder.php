<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user1 = new User();
		$user1->name = "John Smith";
		$user1->email = "john@smith.com";
		$user1->password = bcrypt('secret');
		$user1->role_id = Role::where('name', 'admin')->first()->id;
		$user1->save();
		
		$user2 = new User();
		$user2->name = "Mary Doe";
		$user2->email = "mary@doe.com";
		$user2->password = bcrypt('secret');
		$user2->role_id = Role::where('name', 'user')->first()->id;
		$user2->save();
		
		$user3 = new User();
		$user3->name = "joe bloggs";
		$user3->email = "joe@bloggs.com";
		$user3->password = bcrypt('secret');
		$user3->role_id = Role::where('name', 'user')->first()->id;
		$user3->save();
    }
}
