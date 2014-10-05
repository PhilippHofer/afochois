<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PizzaHasIngredientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pizza_has_ingredients', function($t) {
                $t->foreign('pizza_id')->references('id')->on('pizza');
                $t->foreign('ingredient_id')->references('id')->on('ingredients');
                $t->timestamps();

                $t->primary(array('pizza_id', 'ingredient_id'));
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pizza_has_ingredients');
	}

}
