<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserorderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userorder', function($t) {
            $t->foreign('user_id')->references('id')->on('users');
            $t->foreign('pizza_order_id')->references('id')->on('pizzaorder');

            $t->timestamps();

            $t->primary(array('user_id', 'pizza_order_id'));
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userorder');
	}

}
