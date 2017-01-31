<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppUsersLoginLogsTable extends Migration
{
    /**
     * Run the migrations.
     * @description 用户登录日志表
     * @return void
     */
    public function up()
    {
        Schema::create('app_users_login_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->timestamp('login_date')->default(NULL)->nullable()->comment('登录时间');
            $table->string('app_version',20)->default(NULL)->nullable()->comment('app版本号');
            $table->char('login_way',4)->default(1)->nullable()->comment('登录途径0:app登录，1:pc登录');
            $table->char('phone_type',4)->nullable()->comment('手机类型0:android，1:ios');
            $table->string('phone_sys_version',30)->nullable()->comment('手机系统版本');
            $table->timestamps();

            //外键约束
            //$table->foreign('user_id')->references('id')->on('app_users');
        });

        //rename column
//        Schema::table('app_users_login_logs', function ($table) {
//            $table->renameColumn('created_at', 'created_time');
//            $table->renameColumn('updated_at', 'updated_time');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_users_login_logs');
        //
    }
}
