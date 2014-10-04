<?php

Route::get('/', function(){	return View::make('english.profile'); })->before('auth');
Route::controller('/login', 'LoginController');
Route::controller('/logout', 'LogoutController');
Route::post('/changePw', function()
{
    $oldPW = Input::get("oldPW");
    $newPW1 = Input::get("newPW1");
    $newPW2 = Input::get("newPW2");

    $name = Auth::user()->username;

    if(Auth::validate(array('username' => $name, 'password' => $oldPW )))
    {
        if(strlen($newPW1) < 4) {
            return Redirect::intended('english/profile')->with('status', 'error')->with('message', 'Das Passwort muss mindestens 4 Zeichen lang sein');
        }
        if(strcmp($newPW1, $newPW2) == 0) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($newPW1);
            $user->save();
            return Redirect::intended('english/profile')->with('status', 'success')->with('message', 'Das Passwort wurde erfolgreich geändert');
        } else {
            return Redirect::intended('english/profile')->with('status', 'error')->with('message', 'Die eingegebenen Passwörter stimmen nicht überein');
        }

    } else {
        return Redirect::intended('english/profile')->with('status', 'error')->with('message', 'Das eingegebene Passwort stimmt nicht');
    }

})->before('auth');
/*
Pizza Routes
*/
Route::group(array('prefix' => 'english', 'namespace' => 'english'), function(){
    Route::resource('group', 'GroupController', array('except' => array('create', 'edit')));
    Route::post('insert-vocab', 'GroupController@insertVocab')->before('auth');

    Route::get('admin', function() { return View::make('english.admin'); })->before('auth');



    Route::post('test_result', function(){ return View::make('english.learn.test_result');})->before('auth');

    Route::controller('stats', 'StatsController');

    Route::get('learn/{mode?}', function($mode = 'menu')
    {
        if($mode == 'menu'){
            return View::make('english.learn');
        } else if($mode =='list') {
            return View::make('english.learn.list');
        } else if($mode =='train') {
            return View::make('english.learn.train');
        } else if($mode =='practice') {
            return View::make('english.learn.practice');
        } else if($mode =='test') {
            return View::make('english.learn.test');
        } else {
            App:abort(404);
        }

    })->before('auth');

    Route::controller('profile', 'ProfileController');

    /* return all words of the specified groups in json*/
    Route::get('json/words', 'JsonController@allWords');
    /* return all words of the groups, the current user has selected as json*/
    Route::get('json/words/box/{box?}', 'JsonController@userWords')->before('auth')->where('box', '[0-9]+');
    Route::get('json/words/check/', 'JsonController@checkWord')->before('auth');
});
