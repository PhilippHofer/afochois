<?php
namespace english;
class LearnController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
    {
        return \View::make('english.learn');
    }

    public function getList()
    {
        return \View::make('english.learn.list');
    }

    public function getTrain()
    {
        return \View::make('english.learn.train');
    }

    public function getPractice()
    {
        return \View::make('english.learn.practice');
    }

    public function getTest()
    {
        return \View::make('english.learn.test');
    }

}