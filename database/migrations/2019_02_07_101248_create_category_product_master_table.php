<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryProductMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_product_master', function(Blueprint $table)
		{
			$table->integer('id_category_product', true);
			$table->string('category_product_name')->nullable();
			$table->text('category_product_detail', 65535)->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->string('pic_url')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_product_master');
	}

}
