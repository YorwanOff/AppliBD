<?php


namespace applibd\control;

use applibd\models;
use Illuminate\Support\Fluent;

class Controller
{
    private $app;
    public function __construct($a){$this->app = $a;}

    public function findGame($id){
        $g = new models\Game($this->app);
        $data = $g->findById($id);
        return json_encode($data,JSON_FORCE_OBJECT);
    }

    public function getGames(){
        $g = new models\Game($this->app);
        $data = $g->gamesList();
        return json_encode($data,JSON_FORCE_OBJECT);
    }

    public function gamesByPage($page){
        $g = new models\Game($this->app);
        $data = $g->gamesPage($page);
        return json_encode($data, JSON_FORCE_OBJECT);
    }
}