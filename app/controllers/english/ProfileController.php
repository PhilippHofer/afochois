<?php
namespace english;
class ProfileController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
    {
        return \View::make('english.profile');
    }

	

	public function postIndex()
	{
		$groups = \Input::get('group');
        if(!is_array($groups)) {
            $groups = array();
        }
        \Auth::user()->groups()->sync($groups);

        return \Redirect::intended('english/profile')->with('status', 'success')->with('message', 'Gruppen erfolgreich aktualisiert');
	}
}