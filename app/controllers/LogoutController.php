<?php

class LogoutController extends BaseController {

	public function getIndex()
    {
    	Auth::logout();
        return Redirect::intended('login')->with('status', 'success')->with('message', 'Erfolgreich abgemeldet');
    }

	

	
}
