<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname')->comment('用户昵称');
            $table->string('email')->unique()->comment('邮箱地址');
            $table->string('password', 60)->comment('账户密码');
            $table->enum('account_type',[1,0])->default(0)->nullable()->comment('账户类型');
            $table->string('avatar', 100)->nullable()->comment('用户头像');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
