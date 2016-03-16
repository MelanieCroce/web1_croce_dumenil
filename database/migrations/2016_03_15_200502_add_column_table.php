<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('comments', function (Blueprint $table) {
            $table->integer('posts_id')->unsigned()->after('id');
            $table->foreign('posts_id')->references('id')->on('posts');

            $table->integer('users_id')->unsigned()->after('id');
            $table->foreign('users_id')->references('id')->on('users');			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
