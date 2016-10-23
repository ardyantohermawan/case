<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipping', function(Blueprint $table)
		{
			$table->increments('shippingId');
			$table->integer('checkoutId');
			$table->text('shippingAddress');
			$table->string('city');
			$table->text('region');
			$table->integer('estimation');
			$table->string('trackingNumber');
			$table->boolean('isArrived');
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
		Schema::drop('shipping');
	}

}
