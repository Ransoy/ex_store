<?php

use Illuminate\Support\Facades\DB;
class BreadAddTableSeeder extends Seeder{
	
	public function run(){
		
		DB::table('bakery_item_detail')->delete();
		DB::table('bakery_item_detail')->insert(array(
			'id' => 1,
			'bID' => 1,
			'bread_name' => 'pandesal',
			'QUANTITY' => 30,
			'IN' => 20,
			'OUT' => 10,
			'PRICE' => 5
		));
		
	}
	
}