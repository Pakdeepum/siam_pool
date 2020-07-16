<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomeCarouselMainMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('home_carousel_main_master', function(Blueprint $table)
		{
			$table->integer('id_home_carousel_main', true);
			$table->string('pic_url')->nullable();
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
		Schema::drop('home_carousel_main_master');
	}

}
