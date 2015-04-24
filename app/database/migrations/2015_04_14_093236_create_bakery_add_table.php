<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBakeryAddTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bakery_item_detail', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('bID');
			$table->string('bread_name',200);
			$table->integer('QUANTITY');
			$table->integer('IN');
			$table->integer('OUT');
			$table->integer('PRICE');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bakery_item_detail');
	}

}
