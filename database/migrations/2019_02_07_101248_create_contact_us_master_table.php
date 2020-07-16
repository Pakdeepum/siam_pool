<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactUsMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_us_master', function(Blueprint $table)
		{
			$table->integer('id_contact_us')->primary();
			$table->text('contact_us_text_header', 65535)->nullable();
			$table->string('contact_us_email')->nullable();
			$table->string('contact_us_phone')->nullable();
			$table->text('contact_us_address', 65535)->nullable();
			$table->string('contact_us_facebook_url')->nullable();
			$table->string('contact_us_twitter_url')->nullable();
			$table->string('contact_us_instagram_url')->nullable();
			$table->string('contact_us_phone1')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_us_master');
	}

}
