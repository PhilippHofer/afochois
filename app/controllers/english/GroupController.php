<?php
namespace english;
use BaseController;
use english\Group;
use english\Word;
class GroupController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Group::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $group = new Group;
        $group->name = \Input::get('name');
        $group->save();
        return $group;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Group::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $group = Group::find($id);
        $group->name = \Input::get('to');

        $group->save();
        return $group;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
    }


    public function insertVocab(){
        $word = new Word;
        $word->group_id = \Input::get('group');
        $word->english = \Input::get('english');
        $word->german = \Input::get('german');
        $word->save();
        return $word;
    }

	

	
}
