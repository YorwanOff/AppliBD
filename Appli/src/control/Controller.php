<?php


namespace applibd\control;

use applibd\models;

class Controller
{
    public function __construct(){}

    public function findGame($id){
        $g = models\Game::findById($id);
        return json_encode($g->toArray());
    }

    public function getGames(){
        $g = models\Game::gamesList();
        return json_encode($g->toArray());
    }

    public function gamesByPage($page){
        $g = models\Game::gamesPage($page);
        return json_encode($g->toArray());
    }
}