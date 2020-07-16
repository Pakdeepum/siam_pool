<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_master', function(Blueprint $table)
		{
			$table->integer('id_product', true);
			$table->string('product_name');
			$table->integer('id_category_product')->nullable();
			$table->integer('id_brand_product')->nullable();
			$table->text('product_detail', 65535)->nullable();
			$table->integer('id_user')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->string('pic1_url')->nullable();
			$table->integer('promotion_id')->nullable()->default(0);
			$table->string('product_code', 5)->nullable();
			$table->string('pic2_url')->nullable();
			$table->string('pic3_url')->nullable();
			$table->string('pic4_url')->nullable();
			$table->string('pic5_url')->nullable();
			$table->integer('price')->nullable();
			$table->integer('stock_amount')->nullable()->default(0);
			$table->text('product_instruction', 65535)->nullable();
			$table->text('product_warning', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('product_master');
	}

}
