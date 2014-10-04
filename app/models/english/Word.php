<?php
namespace english;
use Eloquent;
class Word extends Eloquent {

    protected $appends = array('correct', 'wrong', 'box');

    protected $hidden = array('pivot', 'created_at', 'updated_at');

    public function group()
    {
        return $this->belongsTo('english\Group');
    }

    public function users()
    {
        return $this->belongsToMany('User', 'user_word')->withPivot('box_level', 'correct', 'wrong');
    }

    public function getCorrectAttribute(){
        $pivot = $this->pivot;
        if($pivot == null){
            return 0;
        } else {
            return $pivot->correct;
        }
    }

    public function getWrongAttribute(){
        $pivot = $this->pivot;
        if($pivot == null){
            return 0;
        } else {
            return $pivot->wrong;
        }
    }

    public function getBoxAttribute(){
        $pivot = $this->pivot;
        if($pivot == null){
            return 1;
        } else {
            return $pivot->box_level;
        }
    }

}
