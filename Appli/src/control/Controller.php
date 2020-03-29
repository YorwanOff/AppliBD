<?php


namespace applibd\control;

use applibd\models;

class Controller
{
    public function __construct(){}

    public function findGame($id){
        $g = new models\Game();
        $data = $g->findById($id);
        return json_encode($data,JSON_FORCE_OBJECT);
    }

    public function getGames(){
        $g = new models\Game();
        $data = $g->gamesList();
        return json_encode($data,JSON_FORCE_OBJECT);
    }

    public function gamesByPage($page){
        $g = new models\Game();
        $data = $g->gamesPage($page);
        return json_encode($data->toArray());
    }
}