<?php

class LoginController extends BaseController {

	public function getIndex()
    {
        return View::make('login');
    }

	

	public function postIndex()
	{
		$name = Input::get("name");
		$pw = Input::get("pw");
		if (Auth::attempt(array('username' => $name, 'password' => $pw)))
		{
		    return Redirect::intended('english/profile');
		}else{
			return Redirect::intended('login')->with('status', 'error')->with('message', 'Falscher Benutzername oder falsches Passwort');
		}
	}


	
}
