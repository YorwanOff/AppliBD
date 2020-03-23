<?php

namespace applibd\models;

class Game extends BaseModel
{
    protected $table = 'game';
    protected $primaryKey = 'id';

    function character(){
        return $this->belongsToMany('applibd\models\Character', 'game2character', 'game_id', 'character_id')->get();
    }

    function developers(){
        return $this->belongsToMany('applibd\models\Company', 'game_publishers', 'game_id', 'comp_id')->get();
    }

    function original_game_ratings() {
        return $this->belongsToMany('applibd\models\GameRating','game2rating','game_id','rating_id')->get();
    }
    /*
       * Q1 : liste des jeux dont le nom contient mario
       */
    function q1($name)
    {
        $liste = Game::where('name', 'like', $name)->get();
        $res = "";
        foreach ($liste as $game) {
            $res .= $game->name . ' : ' . $game->alias . "<br/>";
        }
        return $res;
    }

    /*
     * Q4 : Lister 442 à partir du 21173e
     */
    function q4($number, $start)
    {
        $listeJeu = Game::take($number)->skip($start)->get();
        $res = "";
        foreach ($listeJeu as $game) {
            $res .= $game->name . ' : ' . $game->alias . "<br/>";
        }
        return $res;
    }

    function characterByGame($id){
        $game = Game::find($id);
        $pers = $game->character()->all();
        foreach ($pers as $key => $value){
            echo '<p>'.$value['name']. " : ".$value['deck'].'</p>';
        }
    }

}