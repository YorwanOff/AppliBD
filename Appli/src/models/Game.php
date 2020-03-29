<?php

namespace applibd\models;

use Slim\App;

class Game extends BaseModel
{
    protected $table = 'game';
    protected $primaryKey = 'id';

    function __construct($app)
    {
        parent::__construct($app);
    }

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
        return Game::select('id','alias','deck','original_release_date')
            ->where('id','=',$id)->get();
    }

    function gamesList(){
        return Game::select('id','name','alias','deck')
            ->take(200)->get();
    }

    function gamesPage($page){
        $app = $this->getApp();
        $numPage = ($page > 0 ? $page : 1);
        $skip = 200*($numPage-1);
        $max = Game::count();
        $prev = (($numPage-1 < 1)?1:$numPage-1);
        $next = (($numPage+1 > intdiv($max,200)+1 ? intdiv($max,200) : $numPage+1));
        $games = Game::select('id','name','alias','deck')
            ->take(200)->skip($skip)->get();
        $game_array = [];
        foreach ($games as $game){
            array_push($game_array,[
                'game' => $game,
                'links' => [
                    'prev' => $app->router->pathFor('games').'?pages='.$prev,
                    'next' => $app->router->pathFor('games').'?pages='.$next,
                    'self' => $app->router->pathFor('gamesId',['id' => $game['id']])
                ]
            ]);
        }
        return $game_array;
    }

    function getComments($game_id){

    }

    function characterByGame($id){
        $game = Game::find($id);
        $pers = $game->character()->get();
        foreach ($pers as $key => $value){
            echo '<p>'.$value['name']. " : ".$value['deck'].'</p>';
        }
    }
}