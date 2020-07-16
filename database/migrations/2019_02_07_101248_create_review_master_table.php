<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('review_master', function(Blueprint $table)
		{
			$table->integer('id_review', true);
			$table->string('pic_url')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('id_product')->nullable();
			$table->integer('id_user')->nullable();
			$table->text('review_detail', 65535)->nullable();
			$table->string('name_review')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('review_master');
	}

}
