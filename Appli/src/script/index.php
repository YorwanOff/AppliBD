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
echo $game->rating('Mario%');

$compagnie = new Company();
$compagnie->q2('Japon');

$platform = new Platform();
$platform->q3(10000000);

/*
 * Q5 : Lister les jeux en paginant
 */


$c = new \applibd\models\Character();
$c->findById(12342);
