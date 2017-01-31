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
        Schema::create('app_users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('自增ID');
            $table->string('name',100)->unique()->comment('用户名');
            $table->string('nick_name',100)->nullable()->comment('用户昵称');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('phone',30)->nullable()->unique()->comment('手机号');
            $table->string('password', 60)->comment('密码');
            $table->longText('avatar', 60)->nullable()->comment('头像');
            $table->char('sex', 4)->default(0)->comment('性别:0未知,1男,2女');
            $table->string('signature')->nullable()->comment('签名');
            $table->string('country', 20)->nullable()->comment('国家');
            $table->string('city', 20)->nullable()->comment('城市');
            $table->string('company', 60)->nullable()->comment('公司');
            $table->string('university', 60)->nullable()->comment('学校');
            $table->boolean('is_experiencer')->default(0)->comment('是否体验师');
            $table->boolean('is_author')->default(0)->comment('是否作者');
            $table->boolean('is_banned')->default(0)->comment('是否禁用');
            $table->rememberToken()->comment('remember_token');
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('lock_time')->default(NULL)->nullable()->comment('锁定时间');

        });

        //rename column
        Schema::table('app_users', function ($table) {
            $table->renameColumn('created_at', 'created_time');
            $table->renameColumn('updated_at', 'updated_time');
            $table->renameColumn('deleted_at', 'deleted_time');
        });

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_users');
    }
}
