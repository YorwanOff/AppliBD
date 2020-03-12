<?php

require '../../vendor/autoload.php';

use applibd\models\Game;
use applibd\models\Company;
use applibd\models\Platform;

use Illuminate\Database\Capsule\Manager as DB;

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);


\applibd\bd\Eloquent::start('../conf/conf.ini');


$game = new Game();
/**
$game->q1('%mario%');
$game->q4(442,21173);

$compagnie = new Company();
$compagnie->q2('Japon');

$platform = new Platform();
$platform->q3(10000000);

/*
 * Q5 : Lister les jeux en paginant
 */


/*q1*/
/**
echo "<h2>QUESTION 1</h2>";
$g = new \applibd\models\Game();
$g->characterByGame(12342);
*/
/*q2*/
/**
echo "<h2>QUESTION 2</h2>";
foreach(Game::where('name', 'like', 'Mario%')->get() as $game) {
    foreach ($game->character() as $c) {
        echo '--- ' . $c->name . "<br/>";
    }
}

echo "<h2>QUESTION 3</h2>";
foreach(Company::where('name', 'like', '%Sony%')->get() as $comp) {
    foreach ($comp->game() as $g) {
        echo '--- ' . $g->name . "<br/>";
    }
}
*/
/*q4*/
/**
echo "<h2>QUESTION 4</h2>";
foreach(Game::where('name','like','%Mario%')->get() as $game) {
    echo '----' . $game->name . ' : ' . "<br/>";
    foreach ($game->original_game_ratings() as $rating) {
        echo $rating->name . '<br/>';
    }
}*/
/**
echo "<h2>QUESTION 5</h2>";
$game = Game::has('id','>',3)->where('name', 'like', '%Mario%')->get();
foreach ($game as $g){
    echo '----' . $game->name . "<br/>";
}
*/
/**
echo "<h2>QUESTION 6</h2>";
foreach(Game::where('name', 'like', '%Mario%')->get() as $game){
    foreach ($game->original_game_ratings()->where('name', '=', 'PEGI: 3+')->all() as $r){
        echo '--- ' . $game->name . "<br/>";
    }
}*/

echo "<h2>QUESTION 7</h2>";
foreach(Game::where('name', 'like', 'Mario%')->get() as $game){
    foreach($game->developers()->where('name', 'like', '%'.'Inc.'.'%')->all() as $gamecomp){
        echo '--- ' . $game->name . "<br/>";
        foreach ($gamecomp->original_game_ratings()->where('name', '=', 'PEGI: 3+')->all() as $r){
            echo '--- ' . $game->name . "<br/>";
        }
    }
}
