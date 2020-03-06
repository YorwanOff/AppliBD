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

/*
 * Q1 : liste des jeux dont le nom contient mario
 */
function q1() {
    $liste = Game::where('name', 'like', '%mario%')->get();
    $res="";
    foreach ($liste as $game) {
        $res .= $game->name . ' : ' . $game->alias . "<br/>";
    }
    return $res;
}

/*
 * Q2 : Liste des compagnies installées au Japon
 */
function q2() {
    $listeComp = Company::where('location_country', '=', 'Japan')->get();
    $res = "";
    foreach ($listeComp as $comp) {
        $res .= $comp->name . "<br/>";
    }
    return $res;
}

/*
 * Q3 : Liste des plateformes dont la base installée est >= 10 000 000
 */
function q3() {
    $listePlat = Platform::where('install_base', '>=', 10000000)->get();
    $res = "";
    foreach ($listePlat as $plat) {
        $res .= $plat->name . "<br/>";
    }
    return $res;
}

/*
 * Q4 : Lister 442 à partir du 21173e
 */
function q4() {
    $listeJeu = Game::take(442)->skip(21173)->get();
    $res = "";
    foreach ($listeJeu as $game) {
        $res .= $game->name . ' : ' . $game->alias . "<br/>";
    }
    return $res;
}

/*
 * Q5 : Lister les jeux en paginant
 */

