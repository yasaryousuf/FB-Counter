<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_admin       = Role::where('name', 'Admin')->first();
	    $role_member      = Role::where('name', 'member')->first();
	    $role_subscriber  = Role::where('name', 'subscriber')->first();

	    $user_one = new User();
	    $user_one->first_name = 'Mehedee';
	    $user_one->last_name = 'Test';
	    $user_one->email = 'mehedee.test@gmail.com';
	    $user_one->password = bcrypt('111111');
	    $user_one->save();
	    $user_one->roles()->attach($role_admin);

	    $user_two = new User();
	    $user_two->first_name = 'John';
	    $user_two->last_name = 'Doe';
	    $user_two->email = 'doe@example.com';
	    $user_two->password = bcrypt('secret');
	    $user_two->save();
	    $user_two->roles()->attach($role_member);

	    $user_three = new User();
	    $user_three->first_name = 'Jane';
	    $user_three->last_name = 'Doe';
	    $user_three->email = 'jane@example.com';
	    $user_three->password = bcrypt('secret');
	    $user_three->save();
	    $user_three->roles()->attach($role_subscriber);
    }
}
