<?php


namespace applibd\control;

use applibd\models;

class Controller
{
    private $app;
    public function __construct($a){
        $this->app = $a;
    }

    public function findGame($id){
        $g = new models\Game($this->app);
        $data = $g->findById($id);
        return json_encode($data);
    }

    public function gamesByPage($page){
        $g = new models\Game($this->app);
        $data = $g->gamesPage($page);
        return json_encode($data);
    }

    public function getCharacters($id){
        $g = new models\Game($this->app);
        $data = $g->characterByGame($id);
        return json_encode($data);
    }

    public function getCharacter($id){
        $g = new models\Character();
        $data = $g->findById($id);
        return json_encode($data);
    }
}