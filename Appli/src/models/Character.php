<?php


namespace applibd\models;

class Character extends BaseModel
{
    protected $table = 'character';
    protected $primaryKey = 'id';

    function appears_in(){
        return $this->belongsToMany('applibd\models\Game', 'game2character', 'character_id', 'game_id')->get();
    }

    function findById($id){
        return Character::where('id','=', $id)->first();
    }
}