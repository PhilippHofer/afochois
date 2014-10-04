<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user_word', function($t) {
            $t->integer('user_id')->unsigned();
            $t->integer('word_id')->unsigned();
            $t->integer('box_level')->unsigned();
            $t->integer('correct')->unsigned();
            $t->integer('wrong')->unsigned();

            $t->primary(array('user_id', 'word_id'));
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $t->foreign('word_id')->references('id')->on('words')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('user_word');
	}

}
