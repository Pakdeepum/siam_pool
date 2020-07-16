<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryPromotionMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_promotion_master', function(Blueprint $table)
		{
			$table->integer('id_category_promotion', true);
			$table->string('category_promotion_name', 225)->nullable();
			$table->text('category_promotion_detail', 65535)->nullable();
			$table->integer('stdel')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_promotion_master');
	}

}
