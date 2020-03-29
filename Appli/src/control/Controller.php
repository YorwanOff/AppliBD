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
        return json_encode($data);
    }

    public function getGames(){
        $g = new models\Game($this->app);
        $data = $g->gamesList();
        return json_encode($data);
    }

    public function gamesByPage($page){
        $g = new models\Game($this->app);
        $data = $g->gamesPage($page);
        return json_encode($data);
    }

    public function getComments($id){
        $g = new models\Game($this->app);
        $data = getComments($id);
        return json_encode($data);
    }
}