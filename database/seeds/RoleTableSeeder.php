<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_admin = new Role();
	    $role_admin->name = 'Admin';
	    $role_admin->description = 'admin';
	    $role_admin->save();

	    $role_member = new Role();
	    $role_member->name = 'Member';
	    $role_member->description = 'member';
	    $role_member->save();

	    $role_eMember = new Role();
	    $role_eMember->name = 'Expired Member';
	    $role_eMember->description = 'expired-member';
	    $role_eMember->save();

	    $role_cMember = new Role();
	    $role_cMember->name = 'Canceled Member';
	    $role_cMember->description = 'canceled-member';
	    $role_cMember->save();

	    $role_subscriber = new Role();
	    $role_subscriber->name = 'Subscriber';
	    $role_subscriber->description = 'subscriber';
	    $role_subscriber->save();
    }
}
