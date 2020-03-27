<?php

namespace applibd\models;

class Game extends BaseModel
{
    protected $table = 'game';
    protected $primaryKey = 'id';

    function character(){
        return $this->belongsToMany('applibd\models\Character', 'game2character', 'game_id', 'character_id');
    }

    function developers(){
        return $this->belongsToMany('applibd\models\Company', 'game_publishers', 'game_id', 'comp_id');
    }

    function original_game_ratings() {
        return $this->belongsToMany('applibd\models\GameRating','game2rating','game_id','rating_id');
    }

    function findById($id){
        return Game::find($id);
    }

    function characterByGame($id){
        $game = Game::find($id);
        $pers = $game->character()->get();
        foreach ($pers as $key => $value){
            echo '<p>'.$value['name']. " : ".$value['deck'].'</p>';
        }
    }



}