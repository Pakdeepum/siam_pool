<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;
class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->nullable();
			$table->string('name')->nullable();
			$table->string('email', 50)->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->string('access_token', 60)->nullable();
			$table->integer('roles')->default(0);
			$table->integer('stdel')->default(0);
			$table->integer('stpic')->default(0);
			$table->softDeletes();
			$table->timestamps();
		});

		DB::table('users')->insert(
            array(
                'username' => 'maytee',
                'name' => 'maytee',
                'email' => 'm.palami@hotmail.com',
                'password' => '$2y$10$wypxPFuuD6e0irHCPZyS..kwU/cEixFQFCVOGQa1zOw0H9lTBG8ca',
                'roles' => 0,
                'stdel' => 0,
                'stpic' => 0,
                'created_at' => new Carbon,
                'updated_at' => new Carbon
            )
        );
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
