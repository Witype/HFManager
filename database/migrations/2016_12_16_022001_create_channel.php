<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('app_id')->comment('应用id');
            $table->string('channel_name',60)->comment('渠道名称');
            $table->string('desc')->nullable()->comment("描述");
            $table->timestamps();
            $table->foreign('app_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('channel');
    }
}
