<?php

use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder{
	
	public function run(){
		
		DB::table('users')->delete();
		DB::table('users')->insert(array(
			'username' => 'Admin',
			'password' => Hash::make('admin'),
		));
		
	}
	
}