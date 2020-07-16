<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_master', function(Blueprint $table)
		{
			$table->integer('id_menu', true);
			$table->string('menu_name')->nullable();
			$table->integer('stdel')->nullable();
			$table->string('url')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_master');
	}

}
