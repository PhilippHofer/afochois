<?php
namespace pizza;
class PizzaController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
    {
        return \View::make('pizza.choose');
    }

	public function getChoose()
    {
        return \View::make('pizza.choose');
    }
}