<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotionMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promotion_master', function(Blueprint $table)
		{
			$table->integer('id_promotion', true);
			$table->string('promotion_name')->nullable();
			$table->text('promotion_detail', 65535)->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('id_user')->nullable();
			$table->dateTime('date_upload')->nullable();
			$table->dateTime('date_end_show')->nullable();
			$table->string('pic_url')->nullable();
			$table->integer('id_category_promotion')->nullable();
			$table->integer('id_product')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('promotion_master');
	}

}
