<?php

use Illuminate\Support\Facades\DB;
class StoreAddTableSeeder extends Seeder{
	
	public function run(){
		
		DB::table('store_list')->delete();
		DB::table('store_list')->insert(array(
			'brand_name' => 'Ariel',
			'Quantity' => 30,
			'Price' => 7.50
		));
		
	}
	
}