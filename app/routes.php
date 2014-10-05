<?php

Route::get('/', function(){	return View::make('home'); })->before('auth');
Route::controller('/user', 'UserController');

/*
English Routes
*/
Route::group(array('prefix' => 'english', 'namespace' => 'english'), function(){
    /* Startpage of /english and /english/settings both linked to settingscontroller */
    Route::get('/', 'SettingsController@getIndex');
    Route::controller('settings', 'SettingsController');

    /* All the learn modes are handled in the this controller*/
    Route::controller('learn', 'LearnController');
    /* return all words of the specified groups in json*/
    Route::get('json/words', 'JsonController@allWords');
    /* return all words of the groups, the current user has selected as json*/
    Route::get('json/words/box/{box?}', 'JsonController@userWords')->before('auth')->where('box', '[0-9]+');
    Route::get('json/words/check/', 'JsonController@checkWord')->before('auth');
    /* test result */
    Route::post('test_result', function(){ return View::make('english.learn.test_result');})->before('auth');

    /* Statistik*/
    Route::controller('stats', 'StatsController');

    /* admin page */
    Route::get('admin', function() { return View::make('english.admin'); })->before('auth');
    /* Resource Controller for adding/updating/deleting groups*/
    Route::resource('group', 'GroupController', array('except' => array('create', 'edit')));
    /* Insert of new vocabulary to a group */
    Route::post('insert-vocab', 'GroupController@insertVocab')->before('auth');
});
