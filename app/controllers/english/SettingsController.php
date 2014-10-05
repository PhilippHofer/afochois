<?php
namespace english;
class SettingsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
    {
        return \View::make('english.settings');
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