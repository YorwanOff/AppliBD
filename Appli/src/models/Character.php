<?php


namespace applibd\models;

class Character extends BaseModel
{
    protected $table = 'character';
    protected $primaryKey = 'id';

    function appears_in(){
        return $this->belongsToMany('applibd\models\Game', 'game2character', 'character_id', 'game_id')
            ->withPivot(['game_id','character_id']);
    }

    function findById($id){
        $pers = Character::where('id','=', $id)->first();
        echo $pers['name']." ".$pers['deck'];
    }
}