<?php


namespace applibd\control;

use applibd\models;
use applibd\view\GameView;

class Controller
{
    public function __construct(){}

    public function findGame($id){
        $game = new models\Game();
        return json_encode($game->findById($id));
    }
}