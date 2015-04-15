<?php

use Illuminate\Support\Facades\DB;
class BreadTableSeeder extends Seeder{
	
	public function run(){
		
		DB::table('bakery_list')->delete();
		DB::table('bakery_list')->insert(array(
			'date_now' => '2015-04-08',
			'total' => '300',
		));
		
	}
	
}