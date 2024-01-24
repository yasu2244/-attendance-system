<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimestampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('timestamps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('user_name')->default('')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('break_start')->nullable();
            $table->dateTime('break_end')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            //  posts テーブルの user_id カラムは users テーブルの id カラムを参照する
        });

        Schema::table('timestamps', function (Blueprint $table) {
            $table->string('status')->default('default');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timestamps');
    }
}
