<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppUsersTotalPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users_total_points', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->comment('用户id')->index();
            $table->bigInteger('total_points')->default(0)->nullable()->comment('用户总积分');
            $table->string('remark')->default(NULL)->nullable()->comment('备注');
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
        Schema::drop('app_users_total_points');
    }
}
