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
        $game = Game::select('id','name','alias','deck','description','original_release_date')
            ->where('id','=',$id)->first();
        return [
            'game' => [
                'id' => $game['id'],
                'name' => $game['name'],
                'alias' => $game['alias'],
                'deck' => $game['deck'],
                'description' => strip_tags($game['description']),
                'original_release_date' => $game['original_release_date'],
            ]
        ];
    }

    function gamesPage($page){
        $app = $this->getApp();
        $numPage = ($page > 0 ? $page : 1);
        $skip = 200*($numPage-1);
        $max = Game::count();
        $prev = (($numPage-1 > 0) ? $numPage-1 : 1);
        $next = (($numPage+1 > intdiv($max,200)+1 ? intdiv($max,200)+1 : $numPage+1));
        $games = Game::select('id','name','alias','deck','description','original_release_date')
            ->take(200)->skip($skip)->get();
        $game_array = [];
        foreach ($games as $game){
            array_push($game_array,[
                'game' => [
                    'id' => $game['id'],
                    'name' => $game['name'],
                    'alias' => $game['alias'],
                    'deck' => $game['deck'],
                    'description' => strip_tags($game['description']),
                    'original_release_date' => $game['original_release_date'],
                ],
                'links' => [
                    'prev' => ['href' => $app->router->pathFor('games').'?pages='.$prev],
                    'next' => ['href' => $app->router->pathFor('games').'?pages='.$next],
                    'self' => ['href' => $app->router->pathFor('gamesId',['id' => $game['id']])]
                ]
            ]);
        }
        return $game_array;
    }

    function characterByGame($id){
        $app = $this->getApp();
        $game = Game::find($id);
        $data = $game->character()->get();
        $char_array = [];
        foreach ($data as $char){
            array_push($char_array,[
                'character' => [
                    'name' => $char['name'],
                ],
                'links' => [
                    'self' => ['href' => $app->router->pathFor('character',['id' => $char['id']])]
                ]
            ]);
        }
        return $char_array;
    }
}