<?php


namespace applibd\control;

use applibd\models;

class Controller
{
    public function __construct(){}

    public function findGame($id){
        $app = \Slim\Slim::getInstance();

        $game = new models\Game();
        $g = $game->findById($id);
        echo json_encode($g->toArray());
    }

    public function getGames($id){
        $app = \Slim\Slim::getInstance();

        $game = new models\Game();
        $g = models\Game;
        echo json_encode($g->toArray());
    }
}