<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('lastname');
			$table->string('tel');
			$table->text('address', 65535)->nullable();
			$table->text('full_address', 65535)->nullable();
			$table->integer('province_id')->nullable()->default(0);
			$table->integer('district_id')->nullable()->default(0);
			$table->integer('amphur_id')->nullable()->default(0);
			$table->integer('postcode_id')->nullable()->default(0);
			$table->integer('geo_id')->nullable()->default(0);
			$table->string('phone_code');
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
		Schema::drop('customers');
	}

}
