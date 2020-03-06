<?php


namespace applibd\models;

use Illuminate\Database\Query\Builder;

class Character extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'character';
    protected $primaryKey = 'id';

    function game(){
        return $this->belongsToMany('Game', 'game2character', 'character_id', 'game_id')->get();
    }

    function findById($id){
        $pers = $this->game()->where('id','=', $id)->get();
        foreach ($pers as $key => $value){
            echo $value['name']." ".$value['deck'];
        }
    }
}