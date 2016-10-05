<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_name');
            $table->string('admin_email')->unique();
            $table->string('admin_password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        \App\Admin::create([
            'admin_name' => 'admin',
            'admin_email' => 'admin@admin.com',
            'admin_password' => Hash::make('secret')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('admins');
    }
}
