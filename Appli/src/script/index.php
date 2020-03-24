<?php

require '../../vendor/autoload.php';

use applibd\models\Game;
use applibd\models\Company;
use applibd\models\Platform;

use Illuminate\Database\Capsule\Manager as DB;

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);


\applibd\bd\Eloquent::start('../conf/conf.ini');

DB::connection()->enableQueryLog();
$old = ini_set('memory_limit', '8192M');
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
$game = Game::where('name', 'like', '%Mario%')->get();
foreach($game->character()->all() as $c){
    echo $c->name;
}

/**foreach ($game as $g){
    echo '----' . $game->name . "<br/>";
}*/

/**
echo "<h2>QUESTION 6</h2>";
foreach(Game::where('name', 'like', '%Mario%')->get() as $game){
    foreach ($game->original_game_ratings()->where('name', '=', 'PEGI: 3+')->all() as $r){
        echo '--- ' . $game->name . "<br/>";
    }
}

echo "<h2>QUESTION 7</h2>";
foreach(Game::where('name', 'like', 'Mario%')->get() as $game){
    foreach($game->developers()->where('name', 'like', '%'.'Inc.'.'%')->all() as $gamecomp){
        echo '--- ' . $game->name . "<br/>";
        foreach ($gamecomp->original_game_ratings()->where('name', '=', 'PEGI: 3+')->all() as $r){
            echo '--- ' . $game->name . "<br/>";
        }
    }
}*/
echo "<h2>QUESTION 1</h2>";
$start = microtime(true);
//$games = Game::get();
$end = microtime(true);
$tmp = $end - $start;
echo "Time : ".$tmp;

echo "<h2>QUESTION 2</h2>";
$start = microtime(true);
$games = Game::where('name','like','%Mario%')->get();
$end = microtime(true);
$tmp = $end - $start;
echo "Time : ".$tmp;

echo "<h2>QUESTION 3</h2>";
$start = microtime(true);
foreach(Game::where('name', 'like', 'Mario%')->get() as $game){
    foreach($game->character()->all() as $c){
        $name = $c;
    }
}
$end = microtime(true);
$tmp = $end - $start;
echo "Time : ".$tmp;

echo "<h2>QUESTION 4</h2>";
$start = microtime(true);
foreach(Game::where('name', 'like', 'Mario%')->get() as $game){
    foreach ($game->original_game_ratings()->where('name', '=', 'PEGI: 3+')->all() as $r){
        $name = $game->name;
    }
}
$end = microtime(true);
$tmp = $end - $start;
echo "Time : ".$tmp;

echo "<h2>QUESTION 5</h2>";

echo "<h3>Première valeur</h3>";
$start = microtime(true);
$game = Game::where('name', 'like', 'Mario%')->get();
$end = microtime(true);
$tmp = $end - $start;
echo "Time : ".$tmp;

echo "<h3>Deuxième valeur</h3>";
$start = microtime(true);
$game = Game::where('name', 'like', 'Fire Emblem%')->get();
$end = microtime(true);
$tmp = $end - $start;
echo "Time : ".$tmp;

echo "<h3>Troisième valeur</h3>";
$start = microtime(true);
$game = Game::where('name', 'like', 'Need%')->get();
$end = microtime(true);
$tmp = $end - $start;
echo "Time : ".$tmp;

$games = Game::with('character')->where('name','like','%Mario%')->latest();
foreach ($games as $game) {
    echo $game->character->name;
}