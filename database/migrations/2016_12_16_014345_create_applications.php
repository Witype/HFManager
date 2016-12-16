<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户id');
            $table->string('app_name',60)->comment('应用名称');
            $table->enum('platform',['android','other'])->default('android')->comment('平台');
            $table->uuid('uuid')->unique()->comment('应用唯一标识');
            $table->string('desc')->nullable()->comment('描述');
            $table->string('app_key')->unique()->comment('APP KEY');
            $table->string('package_name')->nullable()->comment('应用包名');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applications');
    }
}
