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

	

	public function postIndex()
	{
		$groups = \Input::get('group');
        if(!is_array($groups)) {
            $groups = array();
        }
        \Auth::user()->groups()->sync($groups);

        return \Redirect::intended('english/settings')->with('status', 'success')->with('message', 'Gruppen erfolgreich aktualisiert');
	}
}