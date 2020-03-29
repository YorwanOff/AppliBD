<?php


namespace applibd\models;


class Users extends BaseModel
{
    protected $table = 'users';
    protected $primaryKey = 'email';

    function comments(){
        return $this->belongsToMany('applibd\models\Games', 'comment', 'email', 'game_id')->get();
    }
}