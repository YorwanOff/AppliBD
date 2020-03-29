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

        $skip = 200*$page-200;
        $prev = (($page-1 < 0)?1:$page-1);
        $next = (($page+1 > intdiv(Game::count(),$skip)+1 ? intdiv(Game::count(),$skip) : $page+1));
        $games = Game::select('id','name','alias','deck')
            ->take(200)->skip($skip)->get();
        $game_array = [];
        foreach ($games as $game){
            array_push($game_array,[
                'game' => $game,
                'links' => [
                    'prev' => $app->router->pathFor('games').'?pages='.$prev,
                    'next' => $app->router->pathFor('games').'?pages='.$next
                ]
            ]);
        }
        return $game_array;
    }

    function characterByGame($id){
        $game = Game::find($id);
        $pers = $game->character()->get();
        foreach ($pers as $key => $value){
            echo '<p>'.$value['name']. " : ".$value['deck'].'</p>';
        }
    }
}