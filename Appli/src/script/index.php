<?php

require '../../vendor/autoload.php';

use applibd\models\Game;
use applibd\models\Company;
use applibd\models\Platform;

use Illuminate\Database\Capsule\Manager as DB;

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);


\applibd\bd\Eloquent::start('../conf/conf.ini');

//$app->get('/q1', q1())->setName('q1');
//$app->get('/q2', q2())->setName('q2');
//$app->get('/q3', q3())->setName('q3');
//$app->get('/q4', q4())->setName('q4');

$game = new Game();
$game->q1('%mario%');
$game->q4(442,21173);

$compagnie = new Company();
$compagnie->q2('Japon');

$platform = new Platform();
$platform->q3(10000000);

/*
 * Q5 : Lister les jeux en paginant
 */


$c = new \applibd\models\Character();
$c->findById(12342);

/*q2*/
foreach(Game::where('name', 'like', 'Mario%')->get() as $game) {
    foreach ($game->character as $c) {
        echo '---' . $c->name . '\n';
    }
}

/*q4*/
foreach(Game::where('name','like','Mario%')->get() as $game) {
    echo '----' . $game->name . ' : ' . $game->id . "\n";
    foreach ($game->original_game_ratings as $rating) {
        echo '##### ' . $rating->name . ' (' . $rating->rating_board->name . '\n';
    }
}