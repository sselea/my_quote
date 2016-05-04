<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Admin as Admin;

class AdminTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Model::unguard();

		$admin = new Admin();
		$admin->name = "admin";
		$admin->password = bcrypt('test_pw');
		$admin->save();
	}

}