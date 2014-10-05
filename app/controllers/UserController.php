<?php

class UserController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('getLogin', 'postLogin')));
    }

    public function getLogin()
    {
        if(!Auth::guest()) {    // if already logged in
            return Redirect::intended('user/profile');
        }
        return View::make('login');
    }

	

	public function postLogin()
	{
		$name = Input::get("name");
		$pw = Input::get("pw");
		if (Auth::attempt(array('username' => $name, 'password' => $pw)))
		{
		    return Redirect::intended('user/profile');
		}else{
			return Redirect::intended('user/login')->with('status', 'error')->with('message', 'Falscher Benutzername oder falsches Passwort');
		}
	}

    public function getLogout()
    {
        Auth::logout();
        return Redirect::intended('user/login')->with('status', 'success')->with('message', 'Erfolgreich abgemeldet');
    }

    public function getProfile(){
        return View::make('profile');
    }

    /* Change Password */
    public function postProfile()
    {
        $oldPW = Input::get("oldPW");
        $newPW1 = Input::get("newPW1");
        $newPW2 = Input::get("newPW2");

        $name = Auth::user()->username;

        if(Auth::validate(array('username' => $name, 'password' => $oldPW )))
        {
            if(strlen($newPW1) < 4) {
                return Redirect::intended('user/profile')->with('status', 'error')->with('message', 'Das Passwort muss mindestens 4 Zeichen lang sein');
            }
            if(strcmp($newPW1, $newPW2) == 0) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($newPW1);
                $user->save();
                return Redirect::intended('user/profile')->with('status', 'success')->with('message', 'Das Passwort wurde erfolgreich geändert');
            } else {
                return Redirect::intended('user/profile')->with('status', 'error')->with('message', 'Die eingegebenen Passwörter stimmen nicht überein');
            }

        } else {
            return Redirect::intended('user/profile')->with('status', 'error')->with('message', 'Das eingegebene Passwort stimmt nicht');
        }

    }


	
}
