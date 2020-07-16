<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelateMenuLevelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relate_menu_level', function(Blueprint $table)
		{
			$table->integer('id_relate', true);
			$table->integer('id_level')->nullable();
			$table->integer('id_menu')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relate_menu_level');
	}

}
