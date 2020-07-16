<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('order_id', 20);
			$table->integer('product_id');
			$table->integer('customer_id');
			$table->integer('product_amount');
			$table->float('charge', 10, 4)->default(0.0000);
			$table->text('slip_image', 65535)->nullable();
			$table->text('delivery_address', 65535)->nullable();
			$table->text('description', 65535)->nullable();
			$table->dateTime('paid_date')->nullable();
			$table->float('paid_price', 10, 4)->default(0.0000);
			$table->string('paid_bank')->nullable()->default('');
			$table->boolean('status')->default(0);
			$table->boolean('send_type')->default(0);
			$table->softDeletes();
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
		Schema::drop('order');
	}

}
