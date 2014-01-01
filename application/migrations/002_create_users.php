<?php

class Migration_Create_Users extends CI_Migration {
	
	public function up() {
		//create admin user
		$u = new User();
		$u->email 		= 'admin@vandermartin.com';
		$u->fName 		= 'Admin';
		$u->password	= '2e88d64594c53fcefa6224097cb1248b061a24ed214bd11f7813fca995c2b5e5';
		$u->salt 		= '220e92d3ea79c8aeb8d5af02f359a375';
		$u->registered	= '1';
		$u->joined		= date('Y-m-d h:i:s');
		$u->save();
		echo "Admin user added successfully! <br /><br />";
		
		$u = new User();
		$u->email 		= 'nathan@vandermartin.com';
		$u->fName 		= 'Nathan';
		$u->lName		= 'Vander Martin';
		$u->password	= '2e88d64594c53fcefa6224097cb1248b061a24ed214bd11f7813fca995c2b5e5';
		$u->salt 		= '220e92d3ea79c8aeb8d5af02f359a375';
		$u->registered	= '1';
		$u->joined		= date('Y-m-d h:i:s');
		$u->save();
		echo "Nathan was added successfully! <br /><br />";
		echo "All default users were created";
		return "Created Default Users (Admin and Nathan).";
	}
	
	public function down() {
		$u = new User();
		$u->truncate();
		echo "Deleted all users";
	}
	
}