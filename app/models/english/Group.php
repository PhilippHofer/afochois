<?php
namespace english;
use Eloquent;
class Group extends Eloquent {

    public function users()
    {
        return $this->belongsToMany('User', 'user_group');
    }

    public function words()
    {
        return $this->hasMany('english\Word');
    }

}
