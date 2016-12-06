<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('web_name');
            $table->text('description');
            $table->string('keywords');
            $table->string('icp');
            $table->text('stat_code');
            $table->string('copyright');
            $table->string('email');
            $table->timestamps();
        });

        \App\Settings::create([
            'web_name' => '优禾尚鲜',
            'description' => '提供高品质主食',
            'keywords' => '优禾尚鲜',
            'icp' => '',
            'stat_code' => '',
            'copyright' => '优禾尚鲜©版权所有',
            'email' => 'admin@admin.com'

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
