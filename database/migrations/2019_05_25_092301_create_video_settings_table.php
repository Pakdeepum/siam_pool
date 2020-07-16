<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_setting', function (Blueprint $table) {
            $table->increments('id_video');
            $table->string('video_url_embed')->nullable();
      		$table->string('video_url')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('stdel')->nullable()->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_setting');
    }
}
