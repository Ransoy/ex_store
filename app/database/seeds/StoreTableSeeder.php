<?php

use Illuminate\Support\Facades\DB;
class StoreTableSeeder extends Seeder{
	
	public function run(){
		
		DB::table('store')->delete();
		DB::table('store')->insert(array(
			'datenow' => '2015-04-08',
			'total' => '300',
		));
		
	}
	
}