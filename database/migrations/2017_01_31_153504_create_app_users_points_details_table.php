<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppUsersPointsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users_points_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('total_points_id')->comment('总积分表id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->comment('用户id')->index();
            $table->bigInteger('points')->default(0)->nullable()->comment('获得积分数');
            $table->string('point_type',30)->default(NULL)->nullable()->comment('积分来源');
            $table->boolean('is_valid')->comment('是否有效0无效，1有效');
            $table->tinyInteger('occur_type')->comment('积分收支类型0收入，1支出');
            $table->string('remark')->default(NULL)->nullable()->comment('备注');
            $table->timestamps();

            //外键约束
            //$table->foreign('user_id')->references('id')->on('app_users');
            //$table->foreign('total_points_id')->references('id')->on('app_users_total_points');
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
//        Schema::table('app_users_login_logs', function ($table) {
//
//            $table->dropForeign(['user_id']);
//        });

        Schema::drop('app_users_points_details');
    }
}
