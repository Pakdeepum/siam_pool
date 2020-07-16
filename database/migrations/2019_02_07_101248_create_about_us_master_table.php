<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAboutUsMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('about_us_master', function(Blueprint $table)
		{
			$table->integer('id_about_us')->primary();
			$table->text('about_us_text_header', 65535)->nullable();
			$table->string('about_us_content_1_header')->nullable();
			$table->text('about_us_content_1_text_1', 65535)->nullable();
			$table->text('about_us_content_1_text_2', 65535)->nullable();
			$table->text('about_us_content_1_text_3', 65535)->nullable();
			$table->text('about_us_content_1_text_4', 65535)->nullable();
			$table->text('about_us_content_1_text_5', 65535)->nullable();
			$table->string('about_us_content_1_pic_url')->nullable();
			$table->string('about_us_content_2_header')->nullable();
			$table->text('about_us_content_2_text_1', 65535)->nullable();
			$table->text('about_us_content_2_text_2', 65535)->nullable();
			$table->text('about_us_content_2_text_3', 65535)->nullable();
			$table->text('about_us_content_2_text_4', 65535)->nullable();
			$table->text('about_us_content_2_text_5', 65535)->nullable();
			$table->string('about_us_content_2_pic_url')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('about_us_master');
	}

}
