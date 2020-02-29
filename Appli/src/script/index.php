<?php

require __DIR__ . 'Appli/vendor/autoload.php';

use applidb\models\Game;
use applidb\models\Company;
use applidb\models\Platform;

use Illuminate\Database\Capsule\Manager as DB;

$c = new Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new Slim\App($c);


\games\AppConf::AddDbConf('../config/games.db.conf.ini');

/*
 * Q1 : liste des jeux dont le nom contient mario
 */

$liste = Game::where('name', 'like', '%mario%')->get();

foreach ($liste as $game) {
    echo $game->name . ' : ' . $game->alias . "\n";
}

echo "Jeux dont le titre contient Mario : " . count($liste). "\n";

/*
 * Q2 : Liste des compagnies installées au Japon
 */

$listeComp = Company::where('location_country', '=','Japan')->get();

foreach ($listeComp as $comp) {
    echo $comp->name."\n";
}

/*
 * Q3 : Liste des plateformes dont la base installée est >= 10 000 000
 */

$listePlat = Platform::where('install_base', '>=', 10000000)->get();

foreach ($listePlat as $plat) {
    echo $plat->name."\n";
}

/*
 * Q4 : Lister 442 à partir du 21173e
 */

$listeJeu = Game::take(442)->skip(21173)->get();

foreach ($listeJeu as $game) {
    echo $game->name . ' : ' . $game->alias . "\n";
}

/*
 * Q5 : Lister les jeux en paginant
 */

