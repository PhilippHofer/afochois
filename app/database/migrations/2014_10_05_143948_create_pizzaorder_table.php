<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaorderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pizzaorder', function($t) {
            $t->foreign('pizza_id')->references('id')->on('pizza');
            $t->foreign('order_id')->references('id')->on('order');

            $t->timestamps();
            
            $t->primary(array('pizza_id', 'order_id'));
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pizzaorder');
	}

}
